/*! ========================================================================
 * dashboard.js
 * Page/renders: index.html
 * Plugins used: flot, sparkline, selectize
 * ======================================================================== */
$(function () {
    // Selectize
    // ================================
    (function () {
        $("#selectize-customselect").selectize();
    })();
     
    // Sparkline
    // ================================
    (function () {
        $(".sparklines").sparkline("html", {
            enableTagOptions: true
        });
    })();
    
    // Area Chart - Spline
    // ================================
    (function () {
        $.plot("#chart-audience", [{
            label: "Visit (All)",
            color: "#DC554F",
            data: [
                ["Jan", 47],
                ["Feb", 84],
                ["Mar", 60],
                ["Apr", 143],
                ["May", 39],
                ["Jun", 86],
                ["Jul", 87]
            ]
        }, {
            label: "Visit (Mobile)",
            color: "#9365B8",
            data: [
                ["Jan", 83],
                ["Feb", 32],
                ["Mar", 16],
                ["Apr", 47],
                ["May", 98],
                ["Jun", 84],
                ["Jul", 18]
            ]
        }], {
            series: {
                lines: {
                    show: false
                },
                splines: {
                    show: true,
                    tension: 0.4,
                    lineWidth: 2,
                    fill: 0.8
                },
                points: {
                    show: true,
                    radius: 4
                }
            },
            grid: {
                borderColor: "rgba(0, 0, 0, 0.05)",
                borderWidth: 1,
                hoverable: true,
                backgroundColor: "transparent"
            },
            tooltip: true,
            tooltipOpts: {
                content: "%x : %y",
                defaultTheme: false
            },
            xaxis: {
                tickColor: "rgba(0, 0, 0, 0.05)",
                mode: "categories"
            },
            yaxis: {
                tickColor: "rgba(0, 0, 0, 0.05)"
            },
            shadowSize: 0
        });
    })();
	
	
	
	
	    // Markers on the world map
    // ================================
    (function () {
        $("#world-map-markers").vectorMap({
            map: "world_mill_en",
            backgroundColor: "#eee",
            scaleColors: ["#91C854", "#ED5466"],
            normalizeFunction: "polynomial",
            hoverOpacity: 0.7,
            hoverColor: false,
            markerStyle: {
                initial: {
                    fill: "#3b5998",
                    stroke: "#23355b"
                }
            },
            markers: [
                { latLng: [41.90, 12.45], name: "Vatican City" },
                { latLng: [43.73, 7.41], name: "Monaco" },
                { latLng: [-0.52, 166.93], name: "Nauru" },
                { latLng: [-8.51, 179.21], name: "Tuvalu" },
                { latLng: [43.93, 12.46], name: "San Marino" },
                { latLng: [47.14, 9.52], name: "Liechtenstein" },
                { latLng: [7.11, 171.06], name: "Marshall Islands" },
                { latLng: [17.3, -62.73], name: "Saint Kitts and Nevis" },
                { latLng: [3.2, 73.22], name: "Maldives" },
                { latLng: [35.88, 14.5], name: "Malta" },
                { latLng: [12.05, -61.75], name: "Grenada" },
                { latLng: [13.16, -61.23], name: "Saint Vincent and the Grenadines" },
                { latLng: [13.16, -59.55], name: "Barbados" },
                { latLng: [17.11, -61.85], name: "Antigua and Barbuda" },
                { latLng: [-4.61, 55.45], name: "Seychelles" },
                { latLng: [7.35, 134.46], name: "Palau" },
                { latLng: [42.5, 1.51], name: "Andorra" },
                { latLng: [14.01, -60.98], name: "Saint Lucia" },
                { latLng: [6.91, 158.18], name: "Federated States of Micronesia" },
                { latLng: [1.3, 103.8], name: "Singapore" },
                { latLng: [1.46, 173.03], name: "Kiribati" },
                { latLng: [-21.13, -175.2], name: "Tonga" },
                { latLng: [15.3, -61.38], name: "Dominica" },
                { latLng: [-20.2, 57.5], name: "Mauritius" },
                { latLng: [26.02, 50.55], name: "Bahrain" },
                { latLng: [0.33, 6.73], name: "São Tomé and Príncipe" }
            ]
        });
    })();
});