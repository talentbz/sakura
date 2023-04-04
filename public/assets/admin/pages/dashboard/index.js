/******/ (function() { // webpackBootstrap
/*!***************************************************!*\
  !*** ./resources/js/pages/saas-dashboard.init.js ***!
  \***************************************************/
/*
Template Name: Skote - Admin & Dashboard Template
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Saas dashboard Init Js File
*/
// Line chart

var user_input = (JSON.parse(user_data.replace(/&quot;/g, '"')));
var user_output = [null, null, null, null, null, null, null, null, null, null, null, null];
$.each(user_input, function(index, value) {
  var monthIndex = value.month - 1; // Subtract 1 from month value to get the zero-based index
  user_output[monthIndex] = value.total;
});

var options = {
    series: [{
      name: 'Users',
      data: user_output
    }],
    chart: {
      height: 350,
      type: 'line',
      toolbar: 'false',
      dropShadow: {
        enabled: true,
        color: '#000',
        top: 18,
        left: 7,
        blur: 8,
        opacity: 0.2
      }
    },
    dataLabels: {
      enabled: false
    },
    colors: ['#556ee6'],
    stroke: {
      curve: 'smooth',
      width: 3
    },
  };
  var chart = new ApexCharts(document.querySelector("#line-chart"), options);
  chart.render(); 
  
// get user data and redraw line chat
$('.select-year').on("change", function (e) { 
  var year = $(e.currentTarget).val();
  console.log(year)
  $.ajax({
    url: get_user,
    method: 'get',
    data: {year:year},
    success: function (data){
      // user_data = data.data;
      var user_input = data.data;
      var user_output = [null, null, null, null, null, null, null, null, null, null, null, null];
      $.each(user_input, function(index, value) {
        var monthIndex = value.month - 1; // Subtract 1 from month value to get the zero-based index
        user_output[monthIndex] = value.total;
      });
      chart.updateSeries([{ 
        name: 'Users',
        data: user_output 
      }]); 
    }
  })
})
// pie chart
var dom = document.getElementById("pie-chart");
var myChart = echarts.init(dom);
jsonString = vehicle_data
var decodedString = jsonString.replace(/&quot;/g, '"');
var jsonData = JSON.parse(decodedString);

option = null;
option = {
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        data: ['New Vehicle', 'Inquiry','Invoice Issued','Payment Received','Shipping','Document'],
        textStyle: {color: '#8791af'}
    },
    color: ['#306391', '#f46a6a', '#34c38f', '#50a5f1', '#f1b44c', '#556ee6'],
    series : [
        {
            name: 'Total Vehicles',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            data:jsonData,
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
    ]
};
;
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}


  /******/ })()
  ;