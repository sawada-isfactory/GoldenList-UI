var chart = AmCharts.makeChart( "result1", {
  "type": "serial",
  "addClassNames": true,
  "theme": "light",
  "fontFamily": "メイリオ",
  "balloon": {
    "adjustBorderColor": false,
    "horizontalPadding": 10,
    "verticalPadding": 0,
    "color": "#ffffff",
  },
  "dataProvider": [ {
    "item": "リスト件数",
    "number": 30000,
    "color": "rgba(27, 123, 148, 0.8)",
  }, {
    "item": "予測接続件数",
    "number": 4860,
    "color": "rgba(27, 123, 148, 0.8)",
  }, {
    "item": "予測成約件数",
    "number": 671,
    "color": "rgba(27, 123, 148, 0.8)",
  }],
  //軸
  "valueAxes": [ {
    "id":"bar",
    "axisAlpha": 0,
    "position": "left"
  } ,
 ],
  "startDuration": 0,
  "graphs": [ {
      //棒グラフ
    "alphaField": "alpha",
    "balloonText": "<span style='font-size:20px;'>[[value]]件</span> [[additional]]</span>",
    "fillAlphas": 1,
    "title": "Number",
    "type": "column",
    "valueField": "number",
    "dashLengthField": "dashLengthColumn",
    "valueAxis":"bar",
    "colorField":"color",
    "lineColor": "#fff"
  }],
 //horizon
  "categoryField": "item",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0,
  },
  "export": {
    "enabled": true
  }
} );

var chart = AmCharts.makeChart( "result2", {
  "type": "serial",
  "addClassNames": true,
  "theme": "light",
  "fontFamily": "メイリオ",
  "balloon": {
    "adjustBorderColor": false,
    "horizontalPadding": 10,
    "verticalPadding": 0,
    "color": "#ffffff"
  },

  "dataProvider": [ {
    "item": "獲得目標",
    "number": 600,
    "color": "rgba(27, 123, 148, 0.8)",
  }, {
    "item": "必要接続数",
    "number": 4348,
    "color": "rgba(27, 123, 148, 0.8)",
  }, {
    "item": "必要コール件数",
    "number": 26838,
    "color": "rgba(27, 123, 148, 0.8)",
  }],
  //軸
  "valueAxes": [ {
    "id":"bar",
    "axisAlpha": 0,
    "position": "left"
  } ,
 ],
  "startDuration": 0,
  "graphs": [ {
      //棒グラフ
    "alphaField": "alpha",
    "balloonText": "<span style='font-size:20px;'>[[value]]件</span> [[additional]]</span>",
    "fillAlphas": 1,
    "title": "Number",
    "type": "column",
    "valueField": "number",
    "dashLengthField": "dashLengthColumn",
    "valueAxis":"bar",
    "colorField": "color",
    "lineColor": "#fff"
  }],
 //horizon
  "categoryField": "item",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0,
  },
  "export": {
    "enabled": true
  }
} );

var chart = AmCharts.makeChart( "result3", {
  "type": "serial",
  "addClassNames": true,
  "theme": "light",
  "fontFamily": "メイリオ",
  "balloon": {
    "adjustBorderColor": false,
    "horizontalPadding": 10,
    "verticalPadding": 0,
    // "fillColor": "rgba(0, 0, 0, 1)",
    "color": "#ffffff",
  },

  "dataProvider": [ {
    "item": "平日午前",
    "number": 5241,
    "color": "rgba(145, 193, 95, 0.8)",
  }, {
    "item": "平日午後",
    "number": 3399,
    "color": "rgba(145, 193, 95, 0.8)",
  }, {
    "item": "平日夜間",
    "number": 7330,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "休日午前",
    "number": 8486,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "休日午後",
    "number": 2874,
    "color": "rgba(145, 193, 95, 0.8)",
  }, {
    "item": "休日夜間",
    "number": 2670,
    "color": "rgba(145, 193, 95, 0.8)",
  }],
  //軸
  "valueAxes": [ {
    "id":"bar",
    "axisAlpha": 0,
    "position": "left"
  } ,
 ],
  "startDuration": 0,
  "graphs": [ {
      //棒グラフ
    "alphaField": "alpha",
    "balloonText": "<span style='font-size:16px;'>リスト件数( [[category]]):<br><span style='font-size:16px;'>[[value]]件</span> [[additional]]</span>",
    "fillAlphas": 1,
    "title": "Number",
    "type": "column",
    "valueField": "number",
    "dashLengthField": "dashLengthColumn",
    "valueAxis":"bar",
    "colorField": "color",
    "lineColor": "#e0e0e0"
  }],
 //horizon
  "categoryField": "item",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0,
  },
  "export": {
    "enabled": true
  }
} );

var chart = AmCharts.makeChart( "result4", {
  "type": "serial",
  "addClassNames": true,
  "theme": "light",
  "fontFamily": "メイリオ",
  "balloon": {
    "adjustBorderColor": false,
    "horizontalPadding": 10,
    "verticalPadding": 0,
    "color": "#ffffff"
  },

  "dataProvider": [ {
    "item": "平日午前",
    "number": 783,
    "cvr": 14.9,
    "color": "rgba(145, 193, 95, 0.8)",
  }, {
    "item": "平日午後",
    "number": 445,
    "cvr": 13.1,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "平日夜間",
    "number": 1337,
    "cvr": 18.2,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "休日午前",
    "number": 1527,
    "cvr": 18.0,
    "color": "rgba(145, 193, 95, 0.8)",
  }, {
    "item": "休日午後",
    "number": 345,
    "cvr": 12.0,
    "color": "rgba(145, 193, 95, 0.8)",
  }, {
    "item": "休日夜間",
    "number": 423,
    "cvr": 15.8,
    "color": "rgba(145, 193, 95, 0.8)",
  }],
  //軸
  "valueAxes": [ {
    "id":"bar",
    "title": "接続件数（件）",
    "axisAlpha": 0,
    "position": "left",
    "baseValue": 0,
    "min": 0
  } ,
  //2軸目
  {
    "id":"line",
    "title": "接続率（％）",
    "axisAlpha": 1,
    "position": "right",
    "unit": "%"
  } ],
  "startDuration": 0,
  "graphs": [ {
      //棒グラフ
    "alphaField": "alpha",
    "balloonText": "<span style='font-size:16px;'>接続件数( [[category]]):<br><span style='font-size:16px;'>[[value]]件</span> [[additional]]</span>",
    "fillAlphas": 1,
    "title": "Number",
    "type": "column",
    "valueField": "number",
    "dashLengthField": "dashLengthColumn",
    "valueAxis":"bar",
    "colorField": "color",
    "lineColor": "#e0e0e0"
  }, {
      //折れ線グラフ
    "id": "graph2",
    "balloonText": "<span style='font-size:12px;'>接続率([[category]]):<br><span style='font-size:12px;'>[[value]]%</span> [[additional]]</span>",
    "bullet": "round",
    "lineThickness": 3,
    "bulletSize": 7,
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "useLineColorForBulletBorder": true,
    "bulletBorderThickness": 3,
    "fillAlphas": 0,
    "lineAlpha": 1,
    "title": "Conversion Rate",
    "valueField": "cvr",
    "dashLengthField": "dashLengthLine",
    "valueAxis":"line",
    "lineColor": "#1b7b94"
  } ],
 //horizon
  "categoryField": "item",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0,
    "tickLength": 0
  },legend: {
     data: [
      {
      title: "接続件数",
      color: "rgba(145, 193, 95, 1)",
      },
      {
      title: "接続率",
      color: "#1b7b94",
      markerType: "circle"
      }],
  align: "center"
  },
  "export": {
    "enabled": true
  }
} );

var chart = AmCharts.makeChart( "result5", {
  "type": "serial",
  "addClassNames": true,
  "theme": "light",
  "fontFamily": "メイリオ",
  "balloon": {
    "adjustBorderColor": false,
    "horizontalPadding": 10,
    "verticalPadding": 0,
    "color": "#ffffff"
  },

  "dataProvider": [ {
    "item": "平日午前",
    "number": 111,
    "cvr": 14.2,
    "color": "rgba(145, 193, 95, 0.8)",
  }, {
    "item": "平日午後",
    "number": 61,
    "cvr": 13.7,
    "color": "rgba(145, 193, 95, 0.8)",
  }, {
    "item": "平日夜間",
    "number": 223,
    "cvr": 16.7,
    "color": "rgba(145, 193, 95, 0.8)",
  }, {
    "item": "休日午前",
    "number": 198,
    "cvr": 13.0,
    "color": "rgba(145, 193, 95, 0.8)",
  }, {
    "item": "休日午後",
    "number": 46,
    "cvr": 13.3,
    "color": "rgba(145, 193, 95, 0.8)",
  }, {
    "item": "休日夜間",
    "number": 32,
    "cvr": 7.6,
    "color": "rgba(145, 193, 95, 0.8)",
  }],
  //軸
  "valueAxes": [ {
    "id":"bar",
    "title": "成約件数（件）",
    "axisAlpha": 0,
    "position": "left"
  } ,
  //2軸目
  {
    "id":"line",
    "title": "接続後成約率（％）",
    "axisAlpha": 1,
    "position": "right",
    "unit": "%"
  } ],
  "startDuration": 0,
  "graphs": [ {
      //棒グラフ
    "alphaField": "alpha",
    "balloonText": "<span style='font-size:16px;'>成約件数( [[category]]):<br><span style='font-size:16px;'>[[value]]件</span> [[additional]]</span>",
    "fillAlphas": 1,
    "title": "Number",
    "type": "column",
    "valueField": "number",
    "dashLengthField": "dashLengthColumn",
    "valueAxis":"bar",
    "colorField": "color",
    "lineColor": "#e0e0e0"
  }, {
      //折れ線グラフ
    "id": "graph2",
    "balloonText": "<span style='font-size:12px;'>接続後成約率([[category]]):<br><span style='font-size:12px;'>[[value]]%</span> [[additional]]</span>",
    "bullet": "round",
    "lineThickness": 3,
    "bulletSize": 7,
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "useLineColorForBulletBorder": true,
    "bulletBorderThickness": 3,
    "fillAlphas": 0,
    "lineAlpha": 1,
    "title": "Conversion Rate",
    "valueField": "cvr",
    "dashLengthField": "dashLengthLine",
    "valueAxis":"line",
    "lineColor": "#1b7b94"
  } ],
 //horizon
  "categoryField": "item",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0,
    "tickLength": 0
  },legend: {
     data: [
      {
      title: "成約件数",
      color: "rgba(145, 193, 95, 1)",
      },
      {
      title: "接続後成約率",
      color: "#1b7b94",
      markerType: "circle"
      }],
  align: "center"
  },
  "export": {
    "enabled": true
  }
} );

var chart = AmCharts.makeChart( "result6", {
  "type": "serial",
  "addClassNames": true,
  "theme": "light",
  "fontFamily": "メイリオ",
  "balloon": {
    "adjustBorderColor": false,
    "horizontalPadding": 10,
    "verticalPadding": 0,
    "color": "#ffffff"
  },
  "dataProvider": [ {
    "age": "～30",
    "number": 23,
    "cvr": 3.0,
    "color": "rgba(145, 193, 95, 0.8)"
  }, {
    "age": "31～40",
    "number": 32,
    "cvr": 4.6,
    "color": "rgba(145, 193, 95, 0.8)"
  }, {
    "age": "41～50",
    "number": 56,
    "cvr": 6.7,
    "color": "rgba(145, 193, 95, 0.8)"
  }, {
    "age": "51～60",
    "number": 73,
    "cvr": 5.8,
    "color": "rgba(145, 193, 95, 0.8)"
  }, {
    "age": "61～",
    "number": 44,
    "cvr": 4.0,
    "color": "rgba(145, 193, 95, 0.8)"
  } ],
  //軸
  "valueAxes": [ {
    "id":"bar",
    "title": "人数（人）",
    "axisAlpha": 0,
    "position": "left"
  } ,
  //2軸目
  {
    "id":"line",
    "title": "成約率（％）",
    "axisAlpha": 1,
    "position": "right",
    "unit": "%"
  } ],
  "startDuration": 0,
  "graphs": [ {
      //棒グラフ
    "alphaField": "alpha",
    "balloonText": "<span style='font-size:12px;'>人数（[[category]]歳）:<br><span style='font-size:12px;'>[[value]]人</span> [[additional]]</span>",
    "fillAlphas": 1,
    "title": "Number",
    "type": "column",
    "valueField": "number",
    "dashLengthField": "dashLengthColumn",
    "valueAxis":"bar",
    "colorField": "color",
    "lineColor": "#e0e0e0"
  }, {
      //折れ線グラフ
    "id": "graph2",
    "balloonText": "<span style='font-size:12px;'>成約率（[[category]]歳）:<br><span style='font-size:12px;'>[[value]]%</span> [[additional]]</span>",
    "bullet": "round",
    "lineThickness": 3,
    "bulletSize": 7,
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "useLineColorForBulletBorder": true,
    "bulletBorderThickness": 3,
    "fillAlphas": 0,
    "lineAlpha": 1,
    "title": "Conversion Rate",
    "valueField": "cvr",
    "dashLengthField": "dashLengthLine",
    "valueAxis":"line",
    "lineColor": "#1b7b94"
  } ],
 //horizon
  "categoryField": "age",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0,
    "tickLength": 0
  },legend: {
     data: [
      {
      title: "人数",
      color: "rgba(145, 193, 95, 1)"
      },
      {
      title: "成約率",
      color: "#1b7b94",
      markerType: "circle"
      }],
  align: "center"
  },
  "export": {
    "enabled": true
  }
} );

var chart = AmCharts.makeChart( "result7", {
  "type": "pie",
  "labelText": "[[percents]]%",
  "theme": "light",
  "startDuration": 0,
  "dataProvider": [ {
    "age": "～30",
    "litres": 2,
    "color": "rgba(175, 216, 248, 0.8)"
  }, {
    "age": "31～40",
    "litres": 20,
    "color": "rgba(77, 167, 77, 0.8)"
  }, {
    "age": "41～50",
    "litres": 44,
    "color": "rgba(203, 75, 75, 0.8)"
  }, {
    "age": "51～60",
    "litres": 29,
    "color": "rgba(237, 194, 64, 0.8)"
  },{
    "age": "61～",
    "litres": 5,
    "color": "rgba(192, 75, 240, 0.8)"
  } ],
  "valueField": "litres",
  "colorField": "color",
  "titleField": "age",
   "balloon":{
   "fixedPosition":true
  },
  "balloonText": "<span style='font-size:12px;'>[[age]]歳:<br><span style='font-size:12px;'>[[value]]%</span> [[additional]]</span>",
   legend: {
  "useGraphSettings": false,
  "valueText": ""
  },
  "export": {
    "enabled": true
  }
} );

var chart = AmCharts.makeChart( "result8", {
  "type": "serial",
  "addClassNames": true,
  "theme": "light",
  "fontFamily": "メイリオ",
  "balloon": {
    "adjustBorderColor": false,
    "horizontalPadding": 10,
    "verticalPadding": 0,
    "color": "#ffffff"
  },

  "dataProvider": [ {
    "gross_income": "～50",
    "number": 54,
    "cvr": 0.4,
    "color": "rgba(145, 193, 95, 0.8)"
  }, {
    "gross_income": "51～100",
    "number": 40,
    "cvr": 2.0,
    "color": "rgba(145, 193, 95, 0.8)"
  }, {
    "gross_income": "101～150",
    "number": 18,
    "cvr": 11,
    "color": "rgba(145, 193, 95, 0.8)"
  }, {
    "gross_income": "151～200",
    "number": 9,
    "cvr": 17,
    "color": "rgba(145, 193, 95, 0.8)"
  }, {
    "gross_income": "201～",
    "number": 3,
    "cvr": 33,
    "color": "rgba(145, 193, 95, 0.8)"
  }, ],
  //軸
  "valueAxes": [ {
    "id":"bar",
    "title": "人数（人）",
    "axisAlpha": 0,
    "position": "left"
  } ,
  //2軸目
  {
    "id":"line",
    "title": "成約率（％）",
    "axisAlpha": 1,
    "position": "right",
      "unit": "%"
  } ],
  "startDuration": 0,
  "graphs": [ {
      //棒グラフ
    "alphaField": "alpha",
    "balloonText": "<span style='font-size:12px;'>人数（[[category]]千円）:<br><span style='font-size:12px;'>[[value]]人</span> [[additional]]</span>",
    "fillAlphas": 1,
    "title": "Number",
    "type": "column",
    "valueField": "number",
    "dashLengthField": "dashLengthColumn",
    "valueAxis":"bar",
    "colorField": "color",
    "lineColor": "#e0e0e0"
  }, {
      //折れ線グラフ
    "id": "graph2",
    "balloonText": "<span style='font-size:12px;'>成約率（[[category]]歳）:<br><span style='font-size:12px;'>[[value]]%</span> [[additional]]</span>",
    "bullet": "round",
    "lineThickness": 3,
    "bulletSize": 7,
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "useLineColorForBulletBorder": true,
    "bulletBorderThickness": 3,
    "fillAlphas": 0,
    "lineAlpha": 1,
    "title": "Conversion Rate",
    "valueField": "cvr",
    "dashLengthField": "dashLengthLine",
    "valueAxis":"line",
    "lineColor":"#1b7b94"
  } ],
 //horizon
  "categoryField": "gross_income",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0,
    "tickLength": 0
  },legend: {
     data: [
      {
      title: "人数",
      color: "rgba(145, 193, 95, 1)"
      },
      {
      title: "成約率",
      color: "#1b7b94",
      markerType: "circle"
      }],
  align: "center"
  },
  "export": {
    "enabled": true
  }
} );

var chart = AmCharts.makeChart( "result9", {
  "type": "pie",
  "labelText": "[[percents]]%",
  "theme": "light",
  "startDuration": 0,
  "dataProvider": [ {
    "gross_income": "～50",
    "litres": 5,
    "color": "rgba(175, 216, 248, 0.8)"
  }, {
    "gross_income": "51～100",
    "litres": 14,
    "color": "rgba(77, 167, 77, 0.8)"
  }, {
    "gross_income": "101～150",
    "litres": 31,
    "color": "rgba(203, 75, 75, 0.8)"
  }, {
    "gross_income": "151～200",
    "litres": 34,
    "color": "rgba(237, 194, 64, 0.8)"
  },  {
    "gross_income": "201～",
    "litres": 16,
    "color": "rgba(192, 75, 240, 0.8)"
  }  ],
  "valueField": "litres",
  "colorField": "color",
  "titleField": "gross_income",
   "balloon":{
   "fixedPosition":true
  },
  "balloonText": "<span style='font-size:12px;'>[[gross_income]]千円:<br><span style='font-size:12px;'>[[value]]%</span> [[additional]]</span>",
  legend: {
  "useGraphSettings": false,
  "valueText": ""
  },
  "export": {
    "enabled": true
  }
} );

var chart = AmCharts.makeChart( "result10", {
  "type": "serial",
  "addClassNames": true,
  "theme": "light",
  "fontFamily": "メイリオ",
  "balloon": {
    "adjustBorderColor": false,
    "horizontalPadding": 10,
    "verticalPadding": 0,
    "color": "#ffffff"
  },

  "dataProvider": [ {
    "item": "2016/06",
    "number": 5000,
    "cvr": 2.6,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "2016/07",
    "number": 10000,
    "cvr": 1.9,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "2016/08",
    "number": 10000,
    "cvr": 2.2,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "2016/09",
    "number": 15000,
    "cvr": 2.0,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "2016/010",
    "number": 15000,
    "cvr": 2.0,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "2016/11",
    "number": 30000,
    "color": "rgba(145, 193, 95, 0.5)",
  }],
  //軸
  "valueAxes": [ {
    "id":"bar",
    "title": "リスト件数（件）",
    "axisAlpha": 0,
    "position": "left"
  } ,
  //2軸目
  {
    "id":"line",
    "title": "成約率（％）",
    "axisAlpha": 1,
    "position": "right",
    "unit": "%"
  } ],
  "startDuration": 0,
  "graphs": [ {
      //棒グラフ
    "alphaField": "alpha",
    "balloonText": "<span style='font-size:16px;'>リスト件数( [[category]]):<br><span style='font-size:16px;'>[[value]]件</span> [[additional]]</span>",
    "fillAlphas": 1,
    "title": "Number",
    "type": "column",
    "valueField": "number",
    "dashLengthField": "dashLengthColumn",
    "valueAxis":"bar",
    "colorField": "color",
    "lineColor": "#e0e0e0"
  }, {
      //折れ線グラフ
    "id": "graph2",
    "balloonText": "<span style='font-size:12px;'>成約率([[category]]):<br><span style='font-size:12px;'>[[value]]%</span> [[additional]]</span>",
    "bullet": "round",
    "lineThickness": 3,
    "bulletSize": 7,
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "useLineColorForBulletBorder": true,
    "bulletBorderThickness": 3,
    "fillAlphas": 0,
    "lineAlpha": 1,
    "title": "Conversion Rate",
    "valueField": "cvr",
    "dashLengthField": "dashLengthLine",
    "valueAxis":"line",
    "lineColor": "#1b7b94"
  } ],
 //horizon
  "categoryField": "item",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0,
    "tickLength": 0
  },legend: {
     data: [
      {
      title: "リスト件数",
      color: "rgba(145, 193, 95, 1)",
      },
      {
      title: "成約率（成約件数 / リスト件数）",
      color: "#1b7b94",
      markerType: "circle"
      }],
  align: "center"
  },
  "export": {
    "enabled": true
  }
} );

var chart = AmCharts.makeChart( "result11", {
  "type": "serial",
  "addClassNames": true,
  "theme": "light",
  "fontFamily": "メイリオ",
  "balloon": {
    "adjustBorderColor": false,
    "horizontalPadding": 10,
    "verticalPadding": 0,
    // "fillColor": "rgba(0, 0, 0, 1)",
    "color": "#ffffff",
  },

  "dataProvider": [ {
    "item": "2016/06",
    "number": 5000,
    "color": "rgba(27, 123, 148, 0.8)",
  },{
    "item": "2016/07",
    "number": 10000,
    "color": "rgba(27, 123, 148, 0.8)",
  },{
    "item": "2016/08",
    "number": 10000,
    "color": "rgba(27, 123, 148, 0.8)",
  },{
    "item": "2016/09",
    "number": 15000,
    "color": "rgba(27, 123, 148, 0.8)",
  },{
    "item": "2016/010",
    "number": 15000,
    "color": "rgba(27, 123, 148, 0.8)",
  },{
    "item": "2016/11",
    "number": 30000,
    "color": "rgba(27, 123, 148, 0.5)",
  }],
  //軸
  "valueAxes": [ {
    "id":"bar",
    "axisAlpha": 0,
    "position": "left"
  } ,
 ],
  "startDuration": 0,
  "graphs": [ {
      //棒グラフ
    "alphaField": "alpha",
    "balloonText": "<span style='font-size:16px;'>リスト件数( [[category]]):<br><span style='font-size:16px;'>[[value]]件</span> [[additional]]</span>",
    "fillAlphas": 1,
    "title": "Number",
    "type": "column",
    "valueField": "number",
    "dashLengthField": "dashLengthColumn",
    "valueAxis":"bar",
    "colorField": "color",
    "lineColor": "#e0e0e0"
  }],
 //horizon
  "categoryField": "item",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0,
  },
  "export": {
    "enabled": true
  }
} );

var chart = AmCharts.makeChart( "result12", {
  "type": "serial",
  "addClassNames": true,
  "theme": "light",
  "fontFamily": "メイリオ",
  "balloon": {
    "adjustBorderColor": false,
    "horizontalPadding": 10,
    "verticalPadding": 0,
    "color": "#ffffff"
  },

  "dataProvider": [  {
    "item": "2016/06",
    "number": 5000,
    "cvr": 100.0,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "2016/07",
    "number": 10000,
    "cvr": 100.0,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "2016/08",
    "number": 8700,
    "cvr": 87.0,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "2016/09",
    "number": 13200,
    "cvr": 88.0,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "2016/010",
    "number": 14100,
    "cvr": 94.0,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "2016/11",
    "number": 27000,
    "color": "rgba(145, 193, 95, 0.5)",
  }],
  //軸
  "valueAxes": [ {
    "id":"bar",
    "title": "コール件数（件）",
    "axisAlpha": 0,
    "position": "left"
  } ,
  //2軸目
  {
    "id":"line",
    "title": "コール率（％）",
    "axisAlpha": 1,
    "position": "right",
    "unit": "%"
  } ],
  "startDuration": 0,
  "graphs": [ {
      //棒グラフ
    "alphaField": "alpha",
    "balloonText": "<span style='font-size:16px;'>コール件数( [[category]]):<br><span style='font-size:16px;'>[[value]]件</span> [[additional]]</span>",
    "fillAlphas": 1,
    "title": "Number",
    "type": "column",
    "valueField": "number",
    "dashLengthField": "dashLengthColumn",
    "valueAxis":"bar",
    "colorField": "color",
    "lineColor": "#e0e0e0"
  }, {
      //折れ線グラフ
    "id": "graph2",
    "balloonText": "<span style='font-size:12px;'>コール率([[category]]):<br><span style='font-size:12px;'>[[value]]%</span> [[additional]]</span>",
    "bullet": "round",
    "lineThickness": 3,
    "bulletSize": 7,
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "useLineColorForBulletBorder": true,
    "bulletBorderThickness": 3,
    "fillAlphas": 0,
    "lineAlpha": 1,
    "title": "Conversion Rate",
    "valueField": "cvr",
    "dashLengthField": "dashLengthLine",
    "valueAxis":"line",
    "lineColor": "#1b7b94"
  } ],
 //horizon
  "categoryField": "item",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0,
    "tickLength": 0
  },legend: {
     data: [
      {
      title: "コール件数",
      color: "rgba(145, 193, 95, 1)",
      },
      {
      title: "コール率",
      color: "#1b7b94",
      markerType: "circle"
      }],
  align: "center"
  },
  "export": {
    "enabled": true
  }
} );

var chart = AmCharts.makeChart( "result13", {
  "type": "serial",
  "addClassNames": true,
  "theme": "light",
  "fontFamily": "メイリオ",
  "balloon": {
    "adjustBorderColor": false,
    "horizontalPadding": 10,
    "verticalPadding": 0,
    "color": "#ffffff"
  },

  "dataProvider": [ {
    "item": "2016/06",
    "number": 910,
    "cvr": 18.2,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "2016/07",
    "number": 1410,
    "cvr": 14.1,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "2016/08",
    "number": 1540,
    "cvr": 17.7,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "2016/09",
    "number": 2165,
    "cvr": 16.4,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "2016/010",
    "number": 1960,
    "cvr": 13.9,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "2016/11",
    "number": 4860,
    "color": "rgba(145, 193, 95, 0.5)",
  }],
  //軸
  "valueAxes": [ {
    "id":"bar",
    "title": "接続件数（件）",
    "axisAlpha": 0,
    "position": "left"
  } ,
  //2軸目
  {
    "id":"line",
    "title": "接続率（％）",
    "axisAlpha": 1,
    "position": "right",
    "unit": "%"
  } ],
  "startDuration": 0,
  "graphs": [ {
      //棒グラフ
    "alphaField": "alpha",
    "balloonText": "<span style='font-size:16px;'>接続件数( [[category]]):<br><span style='font-size:16px;'>[[value]]件</span> [[additional]]</span>",
    "fillAlphas": 1,
    "title": "Number",
    "type": "column",
    "valueField": "number",
    "dashLengthField": "dashLengthColumn",
    "valueAxis":"bar",
    "colorField": "color",
    "lineColor": "#e0e0e0"
  }, {
      //折れ線グラフ
    "id": "graph2",
    "balloonText": "<span style='font-size:12px;'>接続率([[category]]):<br><span style='font-size:12px;'>[[value]]%</span> [[additional]]</span>",
    "bullet": "round",
    "lineThickness": 3,
    "bulletSize": 7,
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "useLineColorForBulletBorder": true,
    "bulletBorderThickness": 3,
    "fillAlphas": 0,
    "lineAlpha": 1,
    "title": "Conversion Rate",
    "valueField": "cvr",
    "dashLengthField": "dashLengthLine",
    "valueAxis":"line",
    "lineColor": "#1b7b94"
  } ],
 //horizon
  "categoryField": "item",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0,
    "tickLength": 0
  },legend: {
     data: [
      {
      title: "接続件数",
      color: "rgba(145, 193, 95, 1)",
      },
      {
      title: "接続率",
      color: "#1b7b94",
      markerType: "circle"
      }],
  align: "center"
  },
  "export": {
    "enabled": true
  }
} );

var chart = AmCharts.makeChart( "result14", {
  "type": "serial",
  "addClassNames": true,
  "theme": "light",
  "fontFamily": "メイリオ",
  "balloon": {
    "adjustBorderColor": false,
    "horizontalPadding": 10,
    "verticalPadding": 0,
    "color": "#ffffff"
  },

  "dataProvider": [  {
    "item": "2016/06",
    "number": 131,
    "cvr": 14.4,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "2016/07",
    "number": 186,
    "cvr": 13.2,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "2016/08",
    "number": 224,
    "cvr": 14.5,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "2016/09",
    "number": 304,
    "cvr": 14.0,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "2016/010",
    "number": 299,
    "cvr": 15.3,
    "color": "rgba(145, 193, 95, 0.8)",
  },{
    "item": "2016/11",
    "number": 671,
    "color": "rgba(145, 193, 95, 0.5)",
  }],
  //軸
  "valueAxes": [ {
    "id":"bar",
    "title": "成約件数（件）",
    "axisAlpha": 0,
    "position": "left"
  } ,
  //2軸目
  {
    "id":"line",
    "title": "接続後成約率（％）",
    "axisAlpha": 1,
    "position": "right",
    "unit": "%"
  } ],
  "startDuration": 0,
  "graphs": [ {
      //棒グラフ
    "alphaField": "alpha",
    "balloonText": "<span style='font-size:16px;'>成約件数( [[category]]):<br><span style='font-size:16px;'>[[value]]件</span> [[additional]]</span>",
    "fillAlphas": 1,
    "title": "Number",
    "type": "column",
    "valueField": "number",
    "dashLengthField": "dashLengthColumn",
    "valueAxis":"bar",
    "colorField": "color",
    "lineColor": "#e0e0e0"
  }, {
      //折れ線グラフ
    "id": "graph2",
    "balloonText": "<span style='font-size:12px;'>接続後制約率([[category]]):<br><span style='font-size:12px;'>[[value]]%</span> [[additional]]</span>",
    "bullet": "round",
    "lineThickness": 3,
    "bulletSize": 7,
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "useLineColorForBulletBorder": true,
    "bulletBorderThickness": 3,
    "fillAlphas": 0,
    "lineAlpha": 1,
    "title": "Conversion Rate",
    "valueField": "cvr",
    "dashLengthField": "dashLengthLine",
    "valueAxis":"line",
    "lineColor": "#1b7b94"
  } ],
 //horizon
  "categoryField": "item",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0,
    "tickLength": 0
  },legend: {
     data: [
      {
      title: "成約件数",
      color: "rgba(145, 193, 95, 1)",
      },
      {
      title: "接続後成約率",
      color: "#1b7b94",
      markerType: "circle"
      }],
  align: "center"
  },
  "export": {
    "enabled": true
  }
} );
