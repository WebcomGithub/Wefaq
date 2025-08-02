<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Campaign;
use App\Models\CampaignCategory;
use App\Models\News;
use App\Models\Page;
use App\Repositories\PageRepository;
use Illuminate\Console\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use League\Flysystem\Exception;

class PageController extends AppBaseController
{
    /**
     * @var PageRepository
     */
    public PageRepository $pageRepo;

    /**
     * @param  PageRepository  $pageRepository
     */
    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepo = $pageRepository;
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|View
     *
     * @throws Exception
     * @throws \Exception
     */
    public function index()
    {
        return view('admin.pages.index');
    }

    /**
     * @return Factory|\Illuminate\Contracts\Foundation\Application|View
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * @param  CreatePageRequest  $request
     * @return JsonResponse
     */
    public function store(CreatePageRequest $request)
    {
        $input = $request->all();
        $input['is_active'] = (isset($input['is_active'])) ? 1 : 0;
        /*$this->pageRepo->create($input);*/
        $attachmentsData = [];

        if ($request->has('attachments')) {
            foreach ($request->attachments as $index => $attachment) {
                $title = $attachment['title'];
                $fileInput = "attachments.$index.file";

                if ($request->hasFile($fileInput)) {
                    $file = $request->file($fileInput);
                    $storedPath = $file->store('uploads/reports'); // يمكنك تحديد disk إن أردت
                    $attachmentsData[] = [
                        'title' => $title,
                        'filename' => $storedPath,
                    ];
                }
            }
        } // مثال: إنشاء سجل في جدول pages
        $page = new Page();
        $page->name = $request->name;
        $page->title = $request->title;
        $page->description = $request->description;
        $page->is_active = $request->has('is_active');
        // هنا نحول المصفوفة الى JSON
        $page->files = json_encode($attachmentsData);
        $page->save();

        Flash::success('Page created successfully.');

        return redirect(route('pages.index'));
    }

    /**
     * @return Application|Factory|View
     */
    public function edit(Page $page)
    {
        $pageFiles = $page->files ? json_decode($page->files, true) : [];

        return view('admin.pages.edit', compact('page','pageFiles'));
    }

    /**
     * @param  UpdatePageRequest  $request
     * @param  Page  $page
     * @return JsonResponse
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        $input = $request->all();
        $input['is_active'] = (isset($input['is_active'])) ? 1 : 0;
        /*$this->pageRepo->update($input, $page->id);*/

        // 1️⃣ ابدأ بجمع القديم
        $finalFiles = [];

        if ($request->has('existing_attachments')) {
            foreach ($request->existing_attachments as $item) {
                $finalFiles[] = [
                    'title' => $item['title'],
                    'filename' => $item['filename']
                ];
            }
        }
// 2️⃣ أضف الملفات الجديدة
        if ($request->has('attachments')) {
            foreach ($request->attachments as $index => $attachment) {
                if ($request->hasFile("attachments.$index.file")) {
                    $file = $request->file("attachments.$index.file");
                    $storedPath = $file->store('uploads/reports');
                    $finalFiles[] = [
                        'title' => $attachment['title'],
                        'filename' => $storedPath
                    ];
                }
            }
        }

// 3️⃣ خزن في قاعدة البيانات
        $page->name = $request->name;
        $page->title = $request->title;
        $page->description = $request->description;
        $page->is_active = $request->has('is_active');
        $page->files = json_encode($finalFiles);
        $page->save();

        Flash::success('Page updated successfully.');

        return redirect(route('pages.index'));
    }

    /**
     * @param  Page  $page
     * @return JsonResponse
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return $this->sendSuccess('Page deleted successfully.');
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function changePageStatus(Request $request): JsonResponse
    {
        $page = Page::findOrFail($request->get('id'));
        $page->is_active = ($page->is_active == 0) ? '1' : '0';
        $page->save();

        return $this->sendResponse($page, 'Status updated successfully.');
    }

    /**
     * @param  Page  $page
     *  @return Application|Factory|View
     */
    public function pageDetail(Page $page)
    {
        if ($page->is_active == Page::INACTIVE){
            return redirect(route('landing.home'));
        }
        $data['campaigns'] = Campaign::with('campaignCategory', 'user')->where('status',
            Campaign::STATUS_ACTIVE)->latest()->take(6)->orderBy('is_emergency', 'desc')->get();
        $latestFiveNews = News::latest()->take(5)->get();

        // فك تشفير JSON إلى مصفوفة
        $files = json_decode($page->files, true);
        return view('front_landing.page_detail', compact('page','data','latestFiveNews','files'));
    }

    /**
     * @param  Page  $page
     * @return JsonResponse
     */
    public function show(Page $page)
    {
        return $this->sendResponse($page, 'Inquiry Retrieved Successfully.');
    }
}
