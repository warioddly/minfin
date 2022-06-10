$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    autoplay: true,
    autoPlayTimeout: 600,
    autoplaySpeed: 6000,
    autoplayHoverPause: true,
    dots: false,
    nav: true,
    navText : ["<img src='../../../../front/images/icons/chevron-left.svg' alt=''>","<img src='../../../../front/images/icons/chevron-right.svg' alt=''>"],
    autoHeight: false,
    autoHeightClass: 'owl-height',
    responsive : {
        320 : {
            items: 2,
        },
        425 : {
            items: 3,
        },
        768 : {
            items: 4,
        }
    }
})

let options = {
    series: [68511052.4, 22224506.3],
    labels: ['Доход</br><p class="ms-lg-3 ms-md-2 apex-chart-info-text">68 511 052,4 тыс. сом</p>',
        'Расход</br><p class="ms-lg-3 ms-md-2 apex-chart-info-text position-absolute">68 511 052,4 тыс. сом</p>'],
    chart: {
        type: 'donut',
        height: '160px',
    },
    colors: ['#1068B1', '#083C6F'],
    responsive: [
        {
            breakpoint: 414,
            options: {
                chart: {
                    type: 'donut',
                    height: '100px',
                },
                legend: {
                    position: 'left',
                    horizontalAlign: 'center',
                    fontSize: '12px',
                    fontFamily: 'Arial',
                    fontWeight: 400,
                    offsetY: -28,
                    markers: {
                        width: 6,
                        height: 6,
                    },
                },
                plotOptions: {
                    pie: {
                        offsetX: 0,
                        offsetY: 0,
                        customScale: 1.20,
                        dataLabels: {
                            offset: 0,
                            minAngleToShowLabel: 10
                        },
                        donut: {
                            size: '50%',
                        },
                    }
                },
                dataLabels: {
                    enabled: true,
                    offsetX: 0,
                    offsetY: 0,
                    style: {
                        fontSize: '11px',
                        fontFamily: 'Arial, sans-serif',
                        fontWeight: 'bold',
                        colors: undefined
                    },

                    background: {
                        enabled: true,
                        foreColor: '#fff',
                        padding: 4,
                        borderRadius: 2,
                        borderWidth: 1,
                        borderColor: '#fff',
                        opacity: 0.9,
                    },
                }
            }
        },
        {
            breakpoint: 768,
            options: {
                states: {
                    hover: {
                        filter: {
                            type: 'none',
                        }
                    },
                },
                chart: {
                    type: 'donut',
                    height: '100px',
                },
                legend: {
                    position: 'left',
                    horizontalAlign: 'center',
                    fontSize: '12px',
                    fontFamily: 'Arial',
                    fontWeight: 400,
                    offsetY: -28,
                    markers: {
                        width: 6,
                        height: 6,
                    },
                },
                plotOptions: {
                    pie: {
                        offsetX: 30,
                        offsetY: 0,
                        customScale: 1.20,
                        dataLabels: {
                            offset: 0,
                            minAngleToShowLabel: 10
                        },
                        donut: {
                            size: '50%',
                        },
                    }
                },
                dataLabels: {
                    enabled: true,
                    offsetX: 0,
                    offsetY: 0,
                    style: {
                        fontSize: '11px',
                        fontFamily: 'Arial, sans-serif',
                        fontWeight: 'bold',
                        colors: undefined
                    },

                    background: {
                        enabled: true,
                        foreColor: '#fff',
                        padding: 4,
                        borderRadius: 2,
                        borderWidth: 1,
                        borderColor: '#fff',
                        opacity: 0.9,
                    },
                }
            }
        },
        {
            breakpoint: 768,
            options: {
                chart: {
                    type: 'donut',
                    height: '80px',
                },
                legend: {
                    position: 'left',
                    horizontalAlign: 'center',
                    fontSize: '8px',
                    fontFamily: 'Arial',
                    fontWeight: 400,
                    offsetY: -28,
                    markers: {
                        width: 6,
                        height: 6,
                    },
                },
                plotOptions: {
                    pie: {
                        offsetX: 30,
                        offsetY: 0,
                        customScale: 1.25,
                        dataLabels: {
                            offset: 0,
                            minAngleToShowLabel: 10
                        },
                        donut: {
                            size: '50%',
                        },
                    }
                },
                dataLabels: {
                    enabled: true,
                    offsetX: 0,
                    offsetY: 0,
                    style: {
                        fontSize: '11px',
                        fontFamily: 'Arial, sans-serif',
                        fontWeight: 'bold',
                        colors: undefined
                    },
                    background: {
                        enabled: true,
                        foreColor: '#fff',
                        padding: 4,
                        borderRadius: 2,
                        borderWidth: 1,
                        borderColor: '#fff',
                        opacity: 0.9,
                    },
                }
            }
        },
        {
            breakpoint: 1024,
            options: {
                chart: {
                    type: 'donut',
                    height: '90px',
                },
                legend: {
                    position: 'left',
                    horizontalAlign: 'center',
                    fontSize: '13px',
                    fontFamily: 'Arial',
                    fontWeight: 400,
                    offsetY: -18,
                    markers: {
                        width: 8,
                        height: 8,
                    },
                },
                plotOptions: {
                    pie: {
                        offsetX: 0,
                        offsetY: 5,
                        customScale: 1.31,
                        dataLabels: {
                            offset: 0,
                            minAngleToShowLabel: 10
                        },
                        donut: {
                            size: '50%',
                        },
                    }
                },
            }
        },
        {
            breakpoint: 1205,
            options: {
                chart: {
                    type: 'donut',
                    height: '120px',
                },
                legend: {
                    position: 'left',
                    horizontalAlign: 'center',
                    fontSize: '13px',
                    fontFamily: 'Arial',
                    fontWeight: 400,
                    offsetY: -18,
                    markers: {
                        width: 8,
                        height: 8,
                    },
                },
                plotOptions: {
                    pie: {
                        offsetX: 5,
                        offsetY: 5,
                        customScale: 1.23,
                        dataLabels: {
                            offset: 0,
                            minAngleToShowLabel: 10
                        },
                        donut: {
                            size: '50%',
                        },
                    }
                },
            }
        },
        {
            breakpoint: 1300,
            options: {
                chart: {
                    type: 'donut',
                    height: '250px',
                    width: '100%',
                },
                legend: {
                    position: 'left',
                    horizontalAlign: 'center',
                    fontSize: '18px',
                    fontFamily: 'Arial',
                    fontWeight: 400,
                    offsetY: -18,
                    markers: {
                        width: 12,
                        height: 12,
                    },
                },
                plotOptions: {
                    pie: {
                        offsetX: 10,
                        offsetY: 5,
                        customScale: 1.1,
                        dataLabels: {
                            offset: 0,
                            minAngleToShowLabel: 10
                        },
                        donut: {
                            size: '50%',
                        },
                    }
                },
            }
        },
        {
            breakpoint: 4000,
            options: {
                chart: {
                    type: 'donut',
                    height: '140px',
                    width: '100%',
                },
                legend: {
                    position: 'left',
                    horizontalAlign: 'center',
                    fontSize: '18px',
                    fontFamily: 'Arial',
                    fontWeight: 400,
                    offsetY: -18,
                    markers: {
                        width: 12,
                        height: 12,
                    },
                },
                plotOptions: {
                    pie: {
                        offsetX: -10,
                        offsetY: 5,
                        customScale: 1.18,
                        dataLabels: {
                            offset: 0,
                            minAngleToShowLabel: 10
                        },
                        donut: {
                            size: '50%',
                        },
                    }
                },
            }
        }
    ],
    legend: {
        show: true,
        showForSingleSeries: false,
        showForNullSeries: true,
        showForZeroSeries: true,
        position: 'left',
        horizontalAlign: 'center',
        fontSize: '15px',
        fontFamily: 'Arial',
        fontWeight: 400,
        offsetX: -14,
        labels: {
            colors: '#9FA5AD',
            useSeriesColors: false
        },
        markers: {
            width: 13,
            height: 13,
            offsetX: 1,
        },
        itemMargin: {
            horizontal: -10,
        },
        onItemClick: {
            toggleDataSeries: true
        },
        onItemHover: {
            highlightDataSeries: true
        },
    },
    plotOptions: {
        pie: {
            startAngle: 0,
            endAngle: 360,
            expandOnClick: true,
            offsetX: 65,
            offsetY: 0,
            customScale: 1.1,
            dataLabels: {
                offset: 0,
                minAngleToShowLabel: 10
            },
            donut: {
                size: '55%',
            },
        }
    },
    dataLabels: {
        enabled: true,
        textAnchor: 'middle',
        distributed: false,
        offsetX: 0,
        offsetY: 0,
        style: {
            fontSize: '16px',
            fontFamily: 'Arial, sans-serif',
            fontWeight: 'bold',
            colors: undefined
        },
        background: {
            enabled: true,
            foreColor: '#fff',
            padding: 4,
            borderRadius: 2,
            borderWidth: 1,
            borderColor: '#fff',
            opacity: 0.9,
        },
    }
};

let chart_1 = new ApexCharts(document.querySelector("#economic-chart-1"), options);
chart_1.render();

let chart_2 = new ApexCharts(document.querySelector("#economic-chart-2"), options);
chart_2.render();
