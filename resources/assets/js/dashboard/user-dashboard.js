'use strict'

document.addEventListener('turbo:load', loadUserDashboardData)
let userDonationWithdrawChartContainer = ''
let userWithdrawChartType = 'line'

function loadUserDashboardData () {
    userDonationWithdrawChartContainer = $(
        '#userDonationWithdrawChartContainer')
    initUserDonationWithdrawChart()
}

const initUserDonationWithdrawChart = () => {
    if (!userDonationWithdrawChartContainer.length) {
        return
    }
    $.ajax({
        type: 'GET',
        url: route('user.donation.withdraw.chart'),
        dataType: 'json',
        success: function (result) {
            userDonationWithdrawChart(result.data);
        },
        cache: false,
    });
}

const userDonationWithdrawChart = (data) => {
    $('#userDonationWithdrawChart').remove()
    $('#userDonationWithdrawChartContainer').append('<div id="userDonationWithdrawChart" style="height: 350px" class="card-rounded-bottom"></div>');

    let e = document.getElementById('userDonationWithdrawChart');

    e && new ApexCharts(e, {
        chart: {
            fontFamily: 'inherit',
            type: userWithdrawChartType,
            stacked: false,
            height: 350,
            toolbar: { show: false }
        },
        dataLabels: { enabled: false },
        colors: ['#0095E8', '#47BE7D'],
        series: [
            {
                name: 'Total Donation',
                data: data.donationData.dataset,
            },
            {
                name: 'Total Withdraw',
                data: data.withdrawDataset.dataset,
            },
        ],
        stroke: {
            curve: 'smooth',
            width: [4, 4],
            colors: ['#009EF7', '#47BE7D'],
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '25%',
                endingShape: 'rounded'
            },
        },
        legend: { show: false },
        xaxis: {
            categories: data.labels,
            labels: { style: { colors: '#A1A5B7', fontSize: '12px' } },
        },
        yaxis: {
            labels: { style: { colors: '#A1A5B7', fontSize: '12px' } },
        },
        fill: { opacity: 1 },
        tooltip: {
            style: { fontSize: '12px' },
            y: {
                formatter: function (e) {
                    return '$' + ' ' + addCommas(e)
                },
            },
        },
        grid: {
            borderColor: '#EFF2F5',
            padding: { top: 0, right: 2, bottom: 0, left: 2 },
        },
    }).render()
}

listenClick('#userChangeDonationWithdrawChart', function () {
    if (userWithdrawChartType === 'bar') {
        userWithdrawChartType = 'line';
        $('.chart').removeClass('fa-chart-line');
        $('.chart').addClass('fa-chart-bar');
        initUserDonationWithdrawChart()
    } else {
        userWithdrawChartType = 'bar';
        $('.chart').addClass('fa-chart-line');
        $('.chart').removeClass('fa-chart-bar');
        initUserDonationWithdrawChart()
    }
})
