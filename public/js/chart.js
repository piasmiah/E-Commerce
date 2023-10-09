document.addEventListener("DOMContentLoaded", function () {

    var barChartOptions = {

    series: [
        {
            data: product,
            name: 'Products',
        },
    ],
    chart: {
        type: 'bar',
        background: 'transparent',
        height: 350,
        toolbar: {
            show: false,
        },
    },
    colors: ['#2962ff', '#d50000', '#2e7d32', '#ff6d00', '#583cb3'],
    plotOptions: {
        bar: {
            distributed: true,
            borderRadius: 4,
            horizontal: false,
            columnWidth: '40%',
        },
    },
    dataLabels: {
        enabled: false,
    },
    fill: {
        opacity: 1,
    },
    grid: {
        borderColor: '#55596e',
        yaxis: {
            lines: {
                show: true,
            },
        },
        xaxis: {
            lines: {
                show: true,
            },
        },
    },
    legend: {
        labels: {
            colors: '#342E37',
        },
        show: true,
        position: 'top',
    },
    stroke: {
        colors: ['transparent'],
        show: true,
        width: 2,
    },
    tooltip: {
        shared: true,
        intersect: false,
        theme: 'dark',
    },
    xaxis: {
        categories: productNames,
        title: {
            style: {
                color: '#342E37',
            },
        },
        axisBorder: {
            show: true,
            color: '#55596e',
        },
        axisTicks: {
            show: true,
            color: '#55596e',
        },
        labels: {
            style: {
                colors: '#342E37',
            },
        },
    },
    yaxis: {
        title: {
            text: 'Count',
            style: {
                color: '#342E37',
            },
        },
        axisBorder: {
            color: '#55596e',
            show: true,
        },
        axisTicks: {
            color: '#55596e',
            show: true,
        },
        labels: {
            style: {
                colors: '#342E37',
            },
        },
    },
};

var barChart = new ApexCharts(
    document.querySelector('#bar-chart'),
    barChartOptions
);
barChart.render();

    var barChart2 = new ApexCharts(
        document.querySelector('#bar-chart2'),
        barChartOptions
    );
    barChart2.render();

// AREA CHART
    var areaChartOptions = {
        series: [
            {
                name: 'Sales Orders',
                data: [11, 32, 45, 32, 34, 52, 41],
            },
        ],
        chart: {
            type: 'area',
            background: 'transparent',
            height: 350,
            stacked: false,
            toolbar: {
                show: false,
            },
        },
        colors: ['#00ab57'],
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug','Spt','Oct','Nov','Dec'],
        dataLabels: {
            enabled: false,
        },
        fill: {
            gradient: {
                opacityFrom: 0.4,
                opacityTo: 0.1,
                shadeIntensity: 1,
                stops: [0, 100],
                type: 'vertical',
            },
            type: 'gradient',
        },
        grid: {
            borderColor: '#55596e',
            yaxis: {
                lines: {
                    show: true,
                },
            },
            xaxis: {
                lines: {
                    show: true,
                },
            },
        },
        legend: {
            labels: {
                colors: '#342E37',
            },
            show: true,
            position: 'top',
        },
        markers: {
            size: 6,
            strokeColors: '#1b2635',
            strokeWidth: 3,
        },
        stroke: {
            curve: 'smooth',
        },
        xaxis: {
            axisBorder: {
                color: '#55596e',
                show: true,
            },
            axisTicks: {
                color: '#55596e',
                show: true,
            },
            labels: {
                offsetY: 5,
                style: {
                    colors: '#342E37',
                },
            },
        },
        tooltip: {
            shared: true,
            intersect: false,
            theme: 'dark',
        },
    };

    var areaChart = new ApexCharts(
        document.querySelector('#area-chart'),
        areaChartOptions
    );
    areaChart.render();
});
