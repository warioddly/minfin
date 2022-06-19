$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    dots: false,
    nav: true,
    autoWidth:true,
    center:true,
    autoplay:true,
    autoplayTimeout: 6000,
    autoplayHoverPause:false,

    navText : ["<img src='../../../../front/images/icons/chevron-left.svg' alt=''>","<img src='../../../../front/images/icons/chevron-right.svg' alt=''>"],
    autoHeightClass: 'owl-height',
    autoHeight: false,
    responsive : {
        320 : {
            items: 2,
            autoWidth:true,
        },
        425 : {
            items: 3,
            autoWidth:true,
        },
        768 : {
            items: 4,
            autoWidth:true,
        }
    }
})

$('.owl-carousel.third-carousel').owlCarousel({
    rtl: false,
    loop:true,
    margin:10,
    nav:true,
    items:1,
    autoplay:true,
    autoplayTimeout: 1000,
    autoplayHoverPause:true,
})

let chartData = [68511052.4, 22224506.3]
let labelData = [`Доход</br><p class="ms-lg-3 ms-md-2 apex-chart-info-text">${ NumberSeperator(chartData[0]) } тыс. сом</p>`,
    `Расход</br><p class="ms-lg-3 ms-md-2 apex-chart-info-text position-absolute">${ NumberSeperator(chartData[1]) } тыс. сом</p>`]

let options = {
    series: chartData,
    labels: labelData,
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

let chart_1 = new ApexCharts(document.querySelector("#economic-chart-1"), options);
let chart_2 = new ApexCharts(document.querySelector("#economic-chart-2"), options);

chart_1.render();
chart_2.render();

$('.region').hover((event) => {
    let currentRegion = $(event.currentTarget).attr('id');
    let region = $(event.currentTarget).data('region');
    $('#floatingmes').text(region);

    $(event.currentTarget).mousemove((pos) => {
        $("#floatingmes").removeClass('d-none');
        $("#floatingmes").css('left',(pos.pageX -130)+'px').css('top',(pos.pageY - 40)+'px').css('width', 250);
    }).mouseleave(() => {
        $("#floatingmes").addClass('d-none');
    });

    if(currentRegion === 'Chui') {
        chartData = [563532, 222125.44]
        chartData2 = [3422323, 222125.44]
    }
    else if(currentRegion === 'Naryn'){
        chartData = [3422323, 12431333.44]
        chartData2 = [222125, 3422323.44]
    }
    else if(currentRegion === 'Talas'){
        chartData = [4422323, 131333.44]
        chartData2 = [222125, 3422323.44]
    }
    else if(currentRegion === 'Osh'){
        chartData = [122323, 121333.44];
        chartData2 = [1232323, 143523.44]

    }
    else if(currentRegion === 'Batken'){
        chartData = [122323, 1232323.44]
        chartData2 = [143523, 143523.44]
    }
    else if(currentRegion === 'Issyk-kul'){
        chartData = [143523, 122323.44]
        chartData2 = [1232323, 143523.44]
    }
    else if(currentRegion === 'Djalal-Abad'){
        chartData = [1232323, 141333.44]
        chartData2 = [3422323, 143523.44]
    }
    else{
        chartData = [68511052.4, 22224506.3]
        chartData2 = [3422323, 222125.44]
    }

    labelData = [`Доход</br><p class="ms-lg-3 ms-md-2 apex-chart-info-text">${  NumberSeperator(chartData[0]) } тыс. сом</p>`,
        `Расход</br><p class="ms-lg-3 ms-md-2 apex-chart-info-text position-absolute">${  NumberSeperator(chartData[1]) } тыс. сом</p>`]

    chart_1.updateOptions({
        series: chartData,
        labels: labelData,
    })

    labelData = [`Доход</br><p class="ms-lg-3 ms-md-2 apex-chart-info-text">${  NumberSeperator(chartData[0]) } тыс. сом</p>`,
        `Расход</br><p class="ms-lg-3 ms-md-2 apex-chart-info-text position-absolute">${  NumberSeperator(chartData[1]) } тыс. сом</p>`]

    chart_2.updateOptions({
        series: chartData2,
        labels: labelData,
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
    else{
        chartData = [68511052.4, 22224506.3]
    }



    labelData = [`Доход</br><p class="ms-lg-3 ms-md-2 apex-chart-info-text">${ NumberSeperator(chartData[0]) } тыс. сом</p>`,
        `Расход</br><p class="ms-lg-3 ms-md-2 apex-chart-info-text position-absolute">${ NumberSeperator(chartData[1]) } тыс. сом</p>`]

    options['series'] = chartData
    options['labels'] = labelData
    chart_1.updateOptions(options)
})

$('.district').hover((event) => {
    let currentDistrict = $(event.currentTarget).attr('id');
    let district = $(event.currentTarget).data('district');
    $('#floatingmes').text(district);

    $(event.currentTarget).mousemove((pos) => {
        $("#floatingmes").removeClass('d-none');
        $("#floatingmes").css('left',(pos.pageX -185)+'px').css('top',(pos.pageY - 35)+'px').css('width', 237);
    }).mouseleave(() => { $("#floatingmes").addClass('d-none'); });

    if(currentDistrict === 'Tonkskiy') {
        chartData = [563532, 222125.44]
        chartData2 = [3422323, 222125.44]
    }
    else if(currentDistrict === 'Djeti-oguz'){
        chartData = [3422323, 12431333.44]
        chartData2 = [12431333, 222125.44]
    }
    else{
        chartData = [68511052.4, 22224506.3]
        chartData2 = [3422323, 3422323.44]
    }

    labelData = [`Доход</br><p class="ms-lg-3 ms-md-2 apex-chart-info-text">${  NumberSeperator(chartData[0]) } тыс. сом</p>`,
        `Расход</br><p class="ms-lg-3 ms-md-2 apex-chart-info-text position-absolute">${  NumberSeperator(chartData[1]) } тыс. сом</p>`]

    chart_1.updateOptions({
        series: chartData,
        labels: labelData,
    })

    labelData = [`Доход</br><p class="ms-lg-3 ms-md-2 apex-chart-info-text">${  NumberSeperator(chartData[0]) } тыс. сом</p>`,
        `Расход</br><p class="ms-lg-3 ms-md-2 apex-chart-info-text position-absolute">${  NumberSeperator(chartData[1]) } тыс. сом</p>`]

    chart_2.updateOptions({
        series: chartData2,
        labels: labelData,
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


function NumberSeperator(number){
    return number.toString()
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        .replace('.', ",");
}
