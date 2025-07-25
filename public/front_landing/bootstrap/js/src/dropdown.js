/**
 * --------------------------------------------------------------------------
 * Bootstrap (v5.1.3): dropdown.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
 * --------------------------------------------------------------------------
 */

import * as Popper from '@popperjs/core'

import {
    defineJQueryPlugin,
    getElement,
    getElementFromSelector,
    getNextActiveElement,
    isDisabled,
    isElement,
    isRTL,
    isVisible,
    noop,
    typeCheckConfig,
} from './util/index'
import EventHandler from './dom/event-handler'
import Manipulator from './dom/manipulator'
import SelectorEngine from './dom/selector-engine'
import BaseComponent from './base-component'

/**
 * ------------------------------------------------------------------------
 * Constants
 * ------------------------------------------------------------------------
 */

const NAME = 'dropdown'
const DATA_KEY = 'bs.dropdown'
const EVENT_KEY = `.${DATA_KEY}`
const DATA_API_KEY = '.data-api'

const ESCAPE_KEY = 'Escape'
const SPACE_KEY = 'Space'
const TAB_KEY = 'Tab'
const ARROW_UP_KEY = 'ArrowUp'
const ARROW_DOWN_KEY = 'ArrowDown'
const RIGHT_MOUSE_BUTTON = 2 // MouseEvent.button value for the secondary button, usually the right button

const REGEXP_KEYDOWN = new RegExp(
    `${ARROW_UP_KEY}|${ARROW_DOWN_KEY}|${ESCAPE_KEY}`)

const EVENT_HIDE = `hide${EVENT_KEY}`
const EVENT_HIDDEN = `hidden${EVENT_KEY}`
const EVENT_SHOW = `show${EVENT_KEY}`
const EVENT_SHOWN = `shown${EVENT_KEY}`
const EVENT_CLICK_DATA_API = `click${EVENT_KEY}${DATA_API_KEY}`
const EVENT_KEYDOWN_DATA_API = `keydown${EVENT_KEY}${DATA_API_KEY}`
const EVENT_KEYUP_DATA_API = `keyup${EVENT_KEY}${DATA_API_KEY}`

const CLASS_NAME_SHOW = 'show'
const CLASS_NAME_DROPUP = 'dropup'
const CLASS_NAME_DROPEND = 'dropend'
const CLASS_NAME_DROPSTART = 'dropstart'
const CLASS_NAME_NAVBAR = 'navbar'

const SELECTOR_DATA_TOGGLE = '[data-bs-toggle="dropdown"]'
const SELECTOR_MENU = '.dropdown-menu'
const SELECTOR_NAVBAR_NAV = '.navbar-nav'
const SELECTOR_VISIBLE_ITEMS = '.dropdown-menu .dropdown-item:not(.disabled):not(:disabled)'

const PLACEMENT_TOP = isRTL() ? 'top-end' : 'top-start'
const PLACEMENT_TOPEND = isRTL() ? 'top-start' : 'top-end'
const PLACEMENT_BOTTOM = isRTL() ? 'bottom-end' : 'bottom-start'
const PLACEMENT_BOTTOMEND = isRTL() ? 'bottom-start' : 'bottom-end'
const PLACEMENT_RIGHT = isRTL() ? 'left-start' : 'right-start'
const PLACEMENT_LEFT = isRTL() ? 'right-start' : 'left-start'

const Default = {
    offset: [0, 2],
    boundary: 'clippingParents',
    reference: 'toggle',
    display: 'dynamic',
    popperConfig: null,
    autoClose: true,
}

const DefaultType = {
    offset: '(array|string|function)',
    boundary: '(string|element)',
    reference: '(string|element|object)',
    display: 'string',
    popperConfig: '(null|object|function)',
    autoClose: '(boolean|string)',
}

/**
 * ------------------------------------------------------------------------
 * Class Definition
 * ------------------------------------------------------------------------
 */

class Dropdown extends BaseComponent {
    constructor (element, config) {
        super(element)

        this._popper = null
        this._config = this._getConfig(config)
        this._menu = this._getMenuElement()
        this._inNavbar = this._detectNavbar()
    }

    // Getters

    static get Default () {
        return Default
    }

    static get DefaultType () {
        return DefaultType
    }

    static get NAME () {
        return NAME
    }

    // Public

    toggle () {
        return this._isShown() ? this.hide() : this.show()
    }

    show () {
        if (isDisabled(this._element) || this._isShown(this._menu)) {
            return
        }

        const relatedTarget = {
            relatedTarget: this._element,
        }

        const showEvent = EventHandler.trigger(this._element, EVENT_SHOW,
            relatedTarget)

        if (showEvent.defaultPrevented) {
            return
        }

        const parent = Dropdown.getParentFromElement(this._element)
        // Totally disable Popper for Dropdowns in Navbar
        if (this._inNavbar) {
            Manipulator.setDataAttribute(this._menu, 'popper', 'none')
        } else {
            this._createPopper(parent)
        }

        // If this is a touch-enabled device we add extra
        // empty mouseover listeners to the body's immediate children;
        // only needed because of broken event delegation on iOS
        // https://www.quirksmode.org/blog/archives/2014/02/mouse_event_bub.html
        if ('ontouchstart' in document.documentElement &&
            !parent.closest(SELECTOR_NAVBAR_NAV)) {
            [].concat(...document.body.children).
                forEach(elem => EventHandler.on(elem, 'mouseover', noop))
        }

        this._element.focus()
        this._element.setAttribute('aria-expanded', true)

        this._menu.classList.add(CLASS_NAME_SHOW)
        this._element.classList.add(CLASS_NAME_SHOW)
        EventHandler.trigger(this._element, EVENT_SHOWN, relatedTarget)
    }

    hide () {
        if (isDisabled(this._element) || !this._isShown(this._menu)) {
            return
        }

        const relatedTarget = {
            relatedTarget: this._element,
        }

        this._completeHide(relatedTarget)
    }

    dispose () {
        if (this._popper) {
            this._popper.destroy()
        }

        super.dispose()
    }

    update () {
        this._inNavbar = this._detectNavbar()
        if (this._popper) {
            this._popper.update()
        }
    }

    // Private

    _completeHide (relatedTarget) {
        const hideEvent = EventHandler.trigger(this._element, EVENT_HIDE,
            relatedTarget)
        if (hideEvent.defaultPrevented) {
            return
        }

        // If this is a touch-enabled device we remove the extra
        // empty mouseover listeners we added for iOS support
        if ('ontouchstart' in document.documentElement) {
            [].concat(...document.body.children).
                forEach(elem => EventHandler.off(elem, 'mouseover', noop))
        }

        if (this._popper) {
            this._popper.destroy()
        }

        this._menu.classList.remove(CLASS_NAME_SHOW)
        this._element.classList.remove(CLASS_NAME_SHOW)
        this._element.setAttribute('aria-expanded', 'false')
        Manipulator.removeDataAttribute(this._menu, 'popper')
        EventHandler.trigger(this._element, EVENT_HIDDEN, relatedTarget)
    }

    _getConfig (config) {
        config = {
            ...this.constructor.Default,
            ...Manipulator.getDataAttributes(this._element),
            ...config,
        }

        typeCheckConfig(NAME, config, this.constructor.DefaultType)

        if (typeof config.reference === 'object' &&
            !isElement(config.reference) &&
            typeof config.reference.getBoundingClientRect !== 'function'
        ) {
            // Popper virtual elements require a getBoundingClientRect method
            throw new TypeError(
                `${NAME.toUpperCase()}: Option "reference" provided type "object" without a required "getBoundingClientRect" method.`)
        }

        return config
    }

    _createPopper (parent) {
        if (typeof Popper === 'undefined') {
            throw new TypeError(
                'Bootstrap\'s dropdowns require Popper (https://popper.js.org)')
        }

        let referenceElement = this._element

        if (this._config.reference === 'parent') {
            referenceElement = parent
        } else if (isElement(this._config.reference)) {
            referenceElement = getElement(this._config.reference)
        } else if (typeof this._config.reference === 'object') {
            referenceElement = this._config.reference
        }

        const popperConfig = this._getPopperConfig()
        const isDisplayStatic = popperConfig.modifiers.find(
            modifier => modifier.name === 'applyStyles' && modifier.enabled ===
                false)

        this._popper = Popper.createPopper(referenceElement, this._menu,
            popperConfig)

        if (isDisplayStatic) {
            Manipulator.setDataAttribute(this._menu, 'popper', 'static')
        }
    }

    _isShown (element = this._element) {
        return element.classList.contains(CLASS_NAME_SHOW)
    }

    _getMenuElement () {
        return SelectorEngine.next(this._element, SELECTOR_MENU)[0]
    }

    _getPlacement () {
        const parentDropdown = this._element.parentNode

        if (parentDropdown.classList.contains(CLASS_NAME_DROPEND)) {
            return PLACEMENT_RIGHT
        }

        if (parentDropdown.classList.contains(CLASS_NAME_DROPSTART)) {
            return PLACEMENT_LEFT
        }

        // We need to trim the value because custom properties can also include spaces
        const isEnd = getComputedStyle(this._menu).
            getPropertyValue('--bs-position').
            trim() === 'end'

        if (parentDropdown.classList.contains(CLASS_NAME_DROPUP)) {
            return isEnd ? PLACEMENT_TOPEND : PLACEMENT_TOP
        }

        return isEnd ? PLACEMENT_BOTTOMEND : PLACEMENT_BOTTOM
    }

    _detectNavbar () {
        return this._element.closest(`.${CLASS_NAME_NAVBAR}`) !== null
    }

    _getOffset () {
        const { offset } = this._config

        if (typeof offset === 'string') {
            return offset.split(',').map(val => Number.parseInt(val, 10))
        }

        if (typeof offset === 'function') {
            return popperData => offset(popperData, this._element)
        }

        return offset
    }

    _getPopperConfig () {
        const defaultBsPopperConfig = {
            placement: this._getPlacement(),
            modifiers: [
                {
                    name: 'preventOverflow',
                    options: {
                        boundary: this._config.boundary,
                    },
                },
                {
                    name: 'offset',
                    options: {
                        offset: this._getOffset(),
                    },
                }],
        }

        // Disable Popper if we have a static display
        if (this._config.display === 'static') {
            defaultBsPopperConfig.modifiers = [
                {
                    name: 'applyStyles',
                    enabled: false,
                }]
        }

        return {
            ...defaultBsPopperConfig,
            ...(typeof this._config.popperConfig === 'function'
                ? this._config.popperConfig(defaultBsPopperConfig)
                : this._config.popperConfig),
        }
    }

    _selectMenuItem ({ key, target }) {
        const items = SelectorEngine.find(SELECTOR_VISIBLE_ITEMS, this._menu).
            filter(isVisible)

        if (!items.length) {
            return
        }

        // if target isn't included in items (e.g. when expanding the dropdown)
        // allow cycling to get the last item in case key equals ARROW_UP_KEY
        getNextActiveElement(items, target, key === ARROW_DOWN_KEY,
            !items.includes(target)).focus()
    }

    // Static

    static jQueryInterface (config) {
        return this.each(function () {
            const data = Dropdown.getOrCreateInstance(this, config)

            if (typeof config !== 'string') {
                return
            }

            if (typeof data[config] === 'undefined') {
                throw new TypeError(`No method named "${config}"`)
            }

            data[config]()
        })
    }

    static clearMenus (event) {
        if (event && (event.button === RIGHT_MOUSE_BUTTON ||
            (event.type === 'keyup' && event.key !== TAB_KEY))) {
            return
        }

        const toggles = SelectorEngine.find(SELECTOR_DATA_TOGGLE)

        for (let i = 0, len = toggles.length; i < len; i++) {
            const context = Dropdown.getInstance(toggles[i])
            if (!context || context._config.autoClose === false) {
                continue
            }

            if (!context._isShown()) {
                continue
            }

            const relatedTarget = {
                relatedTarget: context._element,
            }

            if (event) {
                const composedPath = event.composedPath()
                const isMenuTarget = composedPath.includes(context._menu)
                if (
                    composedPath.includes(context._element) ||
                    (context._config.autoClose === 'inside' && !isMenuTarget) ||
                    (context._config.autoClose === 'outside' && isMenuTarget)
                ) {
                    continue
                }

                // Tab navigation through the dropdown menu or events from contained inputs shouldn't close the menu
                if (context._menu.contains(event.target) &&
                    ((event.type === 'keyup' && event.key === TAB_KEY) ||
                        /input|select|option|textarea|form/i.test(
                            event.target.tagName))) {
                    continue
                }

                if (event.type === 'click') {
                    relatedTarget.clickEvent = event
                }
            }

            context._completeHide(relatedTarget)
        }
    }

    static getParentFromElement (element) {
        return getElementFromSelector(element) || element.parentNode
    }

    static dataApiKeydownHandler (event) {
        // If not input/textarea:
        //  - And not a key in REGEXP_KEYDOWN => not a dropdown command
        // If input/textarea:
        //  - If space key => not a dropdown command
        //  - If key is other than escape
        //    - If key is not up or down => not a dropdown command
        //    - If trigger inside the menu => not a dropdown command
        if (/input|textarea/i.test(event.target.tagName) ?
            event.key === SPACE_KEY || (event.key !== ESCAPE_KEY &&
                ((event.key !== ARROW_DOWN_KEY && event.key !== ARROW_UP_KEY) ||
                    event.target.closest(SELECTOR_MENU))) :
            !REGEXP_KEYDOWN.test(event.key)) {
            return
        }

        const isActive = this.classList.contains(CLASS_NAME_SHOW)

        if (!isActive && event.key === ESCAPE_KEY) {
            return
        }

        event.preventDefault()
        event.stopPropagation()

        if (isDisabled(this)) {
            return
        }

        const getToggleButton = this.matches(SELECTOR_DATA_TOGGLE)
            ? this
            : SelectorEngine.prev(this, SELECTOR_DATA_TOGGLE)[0]
        const instance = Dropdown.getOrCreateInstance(getToggleButton)

        if (event.key === ESCAPE_KEY) {
            instance.hide()
            return
        }

        if (event.key === ARROW_UP_KEY || event.key === ARROW_DOWN_KEY) {
            if (!isActive) {
                instance.show()
            }

            instance._selectMenuItem(event)
            return
        }

        if (!isActive || event.key === SPACE_KEY) {
            Dropdown.clearMenus()
        }
    }
}

/**
 * ------------------------------------------------------------------------
 * Data Api implementation
 * ------------------------------------------------------------------------
 */

EventHandler.on(document, EVENT_KEYDOWN_DATA_API, SELECTOR_DATA_TOGGLE,
    Dropdown.dataApiKeydownHandler)
EventHandler.on(document, EVENT_KEYDOWN_DATA_API, SELECTOR_MENU,
    Dropdown.dataApiKeydownHandler)
EventHandler.on(document, EVENT_CLICK_DATA_API, Dropdown.clearMenus)
EventHandler.on(document, EVENT_KEYUP_DATA_API, Dropdown.clearMenus)
EventHandler.on(document, EVENT_CLICK_DATA_API, SELECTOR_DATA_TOGGLE,
    function (event) {
        event.preventDefault()
        Dropdown.getOrCreateInstance(this).toggle()
    })

/**
 * ------------------------------------------------------------------------
 * jQuery
 * ------------------------------------------------------------------------
 * add .Dropdown to jQuery only if jQuery is present
 */

defineJQueryPlugin(Dropdown)

export default Dropdown
