$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 20,
    dots: false,
    nav: true,
    autoWidth:false,
    center:false,
    autoplay:true,
    autoplayTimeout: 6000,
    autoplayHoverPause:false,

    navText : ["<img src='../../../../front/images/icons/chevron-left.svg' alt=''>","<img src='../../../../front/images/icons/chevron-right.svg' alt=''>"],
    autoHeightClass: 'owl-height',
    autoHeight: false,
    responsive : {
        320 : {
            items: 2,
        },
        425 : {
            items: 2,
        },
        768 : {
            items: 3,
        },
        1024 : {
            items: 4,
        }
    }
})

getChartData()
    .then(res => {
    let data = res['data'];

    let chart_1_data;
    let chart_2_data;
    let dataChart = {};
    for (const item of data) {
        dataChart[item['city']] = item;
    }

    let options = {
        series: [dataChart['Chui']['tax_fact'], dataChart['Chui']['tax_plan']],
        labels: getLabel([dataChart['Chui']['tax_fact'], dataChart['Chui']['tax_plan']]),
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
                        height: '130px',
                    },
                    legend: {
                        position: 'left',
                        horizontalAlign: 'center',
                        fontSize: '12px',
                        fontFamily: 'Arial',
                        fontWeight: 400,
                        offsetY: -18,
                        markers: {
                            width: 6,
                            height: 6,
                        },
                    },
                    plotOptions: {
                        pie: {
                            offsetX: 0,
                            offsetY: -5,
                            customScale: 1,
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
                breakpoint: 426,
                options: {
                    chart: {
                        type: 'donut',
                        height: '150px',
                    },
                    legend: {
                        position: 'left',
                        horizontalAlign: 'center',
                        fontSize: '16px',
                        fontFamily: 'Arial',
                        fontWeight: 400,
                        offsetY: -18,
                        markers: {
                            width: 6,
                            height: 6,
                        },
                    },
                    plotOptions: {
                        pie: {
                            offsetX: 0,
                            offsetY: 0,
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
                    dataLabels: {
                        enabled: true,
                        offsetX: 0,
                        offsetY: 0,
                        style: {
                            fontSize: '14px',
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
                breakpoint: 515,
                options: {
                    chart: {
                        type: 'donut',
                        height: '150px',
                    },
                    legend: {
                        position: 'left',
                        horizontalAlign: 'center',
                        fontSize: '16px',
                        fontFamily: 'Arial',
                        fontWeight: 400,
                        offsetY: -18,
                        markers: {
                            width: 6,
                            height: 6,
                        },
                    },
                    plotOptions: {
                        pie: {
                            offsetX: 30,
                            offsetY: 0,
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
                    dataLabels: {
                        enabled: true,
                        offsetX: 0,
                        offsetY: 0,
                        style: {
                            fontSize: '14px',
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
                breakpoint: 769,
                options: {
                    chart: {
                        type: 'donut',
                        height: '80px',
                    },
                    legend: {
                        position: 'left',
                        horizontalAlign: 'center',
                        fontSize: '11px',
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
                    dataLabels: {
                        enabled: true,
                        offsetX: 0,
                        offsetY: 0,
                        style: {
                            fontSize: '15px',
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
                breakpoint: 2000,
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
                            offsetX: 0,
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
                    dataLabels: {
                        enabled: true,
                        offsetX: 0,
                        offsetY: 0,
                        style: {
                            fontSize: '18px',
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
                breakpoint: 3800,
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
                            offsetX: 0,
                        },
                    },
                    plotOptions: {
                        pie: {
                            offsetX: 0,
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
                    dataLabels: {
                        enabled: true,
                        offsetX: 0,
                        offsetY: 0,
                        style: {
                            fontSize: '20px',
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
        },
        tooltip: {
            enabled: false,
        }
    };

    let options2 = {...options}

    options2['series'] = [dataChart['Chui']['local_budget_fact'], dataChart['Chui']['local_budget_plan']];
    options2['labels'] = getLabel([dataChart['Chui']['local_budget_fact'], dataChart['Chui']['local_budget_plan']]);

    let chart_1 = new ApexCharts(document.querySelector("#economic-chart-1"), options);
    let chart_2 = new ApexCharts(document.querySelector("#economic-chart-2"), options2);

    chart_1.render();
    chart_2.render();

    $('.region').hover((event) => {
        let currentRegion = $(event.currentTarget).attr('id') + '_region';
        let region = $(event.currentTarget).data('region');
        $('#floatingmes').text(region);

        $(event.currentTarget).mousemove((pos) => {
            $("#floatingmes").removeClass('d-none')
                .css('left',(pos.pageX -130)+'px')
                .css('top',(pos.pageY - 40)+'px')
                .css('width', 250);
        }).mouseleave(() => {
            $("#floatingmes").addClass('d-none');
        });

        if (currentRegion === 'Chui_region') {
            chart_1_data = [dataChart['Chui']['tax_fact'], dataChart['Chui']['tax_plan']];
            chart_2_data = [dataChart['Chui']['local_budget_fact'], dataChart['Chui']['local_budget_plan']];
        } else if (currentRegion === 'Naryn_region') {
            chart_1_data = [dataChart['Naryn_region']['tax_fact'], dataChart['Naryn_region']['tax_plan']];
            chart_2_data = [dataChart['Naryn_region']['local_budget_fact'], dataChart['Naryn_region']['local_budget_plan']];
        } else if (currentRegion === 'Talas_region') {
            chart_1_data = [dataChart['Talas_region']['tax_fact'], dataChart['Talas_region']['tax_plan']];
            chart_2_data = [dataChart['Talas_region']['local_budget_fact'], dataChart['Talas_region']['local_budget_plan']];
        } else if (currentRegion === 'Osh_region') {
            chart_1_data = [dataChart['Osh_region']['tax_fact'], dataChart['Osh_region']['tax_plan']];
            chart_2_data = [dataChart['Osh_region']['local_budget_fact'], dataChart['Osh_region']['local_budget_plan']];
        } else if (currentRegion === 'Batken_region') {
            chart_1_data = [dataChart['Batken_region']['tax_fact'], dataChart['Batken_region']['tax_plan']];
            chart_2_data = [dataChart['Batken_region']['local_budget_fact'], dataChart['Batken_region']['local_budget_plan']];
        } else if (currentRegion === 'Issyk-kul_region') {
            chart_1_data = [dataChart['Issyk-kul_region']['tax_fact'], dataChart['Issyk-kul_region']['tax_plan']];
            chart_2_data = [dataChart['Issyk-kul_region']['local_budget_fact'], dataChart['Issyk-kul_region']['local_budget_plan']];
        } else if (currentRegion === 'Djalal-Abad_region') {
            chart_1_data = [dataChart['Djalal-Abad_region']['tax_fact'], dataChart['Djalal-Abad_region']['tax_plan']];
            chart_2_data = [dataChart['Djalal-Abad_region']['local_budget_fact'], dataChart['Djalal-Abad_region']['local_budget_plan']];
        } else {
            chart_1_data = [dataChart['Chui']['tax_fact'], dataChart['Chui']['tax_plan']];
            chart_2_data = [dataChart['Chui']['local_budget_fact'], dataChart['Chui']['local_budget_plan']];
        }


        chart_1.updateOptions({
            series: chart_1_data,
            labels: getLabel(chart_1_data),
        })

        chart_2.updateOptions({
            series: chart_2_data,
            labels: getLabel(chart_2_data),
        })

        $('.card_region__names').text(region);
    })

    $('.region').click((event) => {
        event.preventDefault();
        let currentRegion = $(event.currentTarget).attr('id');

        $('.main-map').fadeOut(100, function() {
            $('.main-map').addClass('d-none')
        });

        if(currentRegion === 'Chui') {
            $('.Chui').fadeTo('fast', 1, function() {
                $('.back-to-btn').removeClass('d-none')
                $('.Chui').removeClass('d-none')
            });
        }
        else if(currentRegion === 'Naryn'){
            $('.Naryn').fadeTo('fast', 1, function() {
                $('.back-to-btn').removeClass('d-none')
                $('.Naryn').removeClass('d-none')
            });
        }
        else if(currentRegion === 'Talas'){
            $('.Talas').fadeTo('fast', 1, function() {
                $('.back-to-btn').removeClass('d-none')
                $('.Talas').removeClass('d-none')
            });
        }
        else if(currentRegion === 'Osh'){
            $('.Osh').fadeTo('fast', 1, function() {
                $('.back-to-btn').removeClass('d-none')
                $('.Osh').removeClass('d-none')
            });
        }
        else if(currentRegion === 'Batken'){
            $('.Batken').fadeTo('fast', 1, function() {
                $('.back-to-btn').removeClass('d-none')
                $('.Batken').removeClass('d-none')
            });
        }
        else if(currentRegion === 'Issyk-kul'){
            $('.Issyk-kul').fadeTo('fast', 1, function() {
                $('.back-to-btn').removeClass('d-none')
                $('.Issyk-kul').removeClass('d-none')
            });
        }
        else if(currentRegion === 'Djalal-Abad'){
            $('.Djalal-Abad').fadeTo('fast', 1, function() {
                $('.back-to-btn').removeClass('d-none')
                $('.Djalal-Abad').removeClass('d-none')
            });
        }
    })

    $('.district').hover((event) => {
        let district = $(event.currentTarget).data('district');
        let currentDistrict = $(event.currentTarget).data('id');

        $('#floatingmes').text(district);

        $(event.currentTarget).mousemove((pos) => {
            $("#floatingmes").removeClass('d-none').css('left',(pos.pageX -185)+'px').css('top',(pos.pageY - 35)+'px').css('width', 237);
        }).mouseleave(() => { $("#floatingmes").addClass('d-none'); });

        chart_1_data = [dataChart[currentDistrict]['tax_fact'], dataChart[currentDistrict]['tax_plan']];
        chart_2_data = [dataChart[currentDistrict]['local_budget_fact'], dataChart[currentDistrict]['local_budget_plan']];

        chart_1.updateOptions({
            series: chart_1_data,
            labels: getLabel(chart_1_data),
        })

        chart_2.updateOptions({
            series: chart_2_data,
            labels: getLabel(chart_2_data),
        })

        $('.card_region__names').text(district);
    })

    $('.back-to-btn').click(() => {

        $('.main-map').fadeTo('fast', 1, function() {
            $('.back-to-btn').addClass('d-none')
            $('.main-map').removeClass('d-none')
        });

        $('.district-map').fadeOut(100, function() {
            $('.district-map').addClass('d-none')
        });

    })
});

function getChartData() {
    return $.ajax({
        url: '/api/getChartData',
        type: "GET",
        success: res => {
            return res;
        },
    });
}

function separator(number){
    return number.toString()
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        .replace('.', ",");
}

function getLabel(data){
    let locale = $('html').attr('lang');
    let money = 'тыс. '
    let val = 'сом.'
    let fact = 'Факт'
    let plan = 'План'

    if(locale === 'kg'){
        money = 'мин. '
    }
    if(locale === 'en'){
        money = 'th. '
        val = 'som.'
        fact = 'Fact'
        plan = 'Plan'
    }

    return [`${fact}</br><p class="ms-lg-3 ms-md-2 apex-chart-info-text">${ separator(data[0]) } ${money + val}</p>`,
        `${plan}</br><p class="ms-lg-3 ms-md-2 apex-chart-info-text position-absolute">${ separator(data[1]) } ${money + val}</p>`]
}
