"use strict";
$(document).ready(function() {
    var colors = ['#01a9ac', '#fe9365', '#fe5d70', '#0ac282', '#2DCEE3', '#404E67', '#FFB64D'];

    /* BI-POLAR LINE CHART WITH AREA ONLY */
    new Chart(document.getElementById('biPolarLineChart'), {
        type: 'line',
        data: {
            labels: [1, 2, 3, 4, 5, 6, 7, 8],
            datasets: [
                { data: [1, 2, 3, 1, -2, 0, 1, 0], borderColor: colors[0], backgroundColor: colors[0] + '40', fill: true, pointRadius: 0, tension: 0.4 },
                { data: [-2, -1, -2, -1, -2.5, -1, -2, -1], borderColor: colors[1], backgroundColor: colors[1] + '40', fill: true, pointRadius: 0, tension: 0.4 },
                { data: [0, 0, 0, 1, 2, 2.5, 2, 1], borderColor: colors[2], backgroundColor: colors[2] + '40', fill: true, pointRadius: 0, tension: 0.4 },
                { data: [2.5, 2, 1, 0.5, 1, 0.5, -1, -2.5], borderColor: colors[3], backgroundColor: colors[3] + '40', fill: true, pointRadius: 0, tension: 0.4 }
            ]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { min: -3, max: 3 }, x: { grid: { display: false } } }
        }
    });

    /* SERIES OVERRIDES */
    new Chart(document.getElementById('seriesOverridesChart'), {
        type: 'line',
        data: {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8'],
            datasets: [
                { label: 'Series 1', data: [5, 2, -4, 2, 0, -2, 5, -3], borderColor: colors[0], stepped: 'middle', fill: false, tension: 0 },
                { label: 'Series 2', data: [4, 3, 5, 3, 1, 3, 6, 4], borderColor: colors[1], backgroundColor: colors[1] + '40', fill: true, tension: 0.4 },
                { label: 'Series 3', data: [2, 4, 3, 1, 4, 5, 3, 2], borderColor: colors[2], fill: false, pointRadius: 0, tension: 0.4 }
            ]
        },
        options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
    });

    /* HORIZONTAL BAR CHART */
    new Chart(document.getElementById('horizontalBarChart'), {
        type: 'bar',
        data: {
            labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            datasets: [
                { label: 'Series A', data: [5, 4, 3, 7, 5, 10, 3], backgroundColor: colors[0] },
                { label: 'Series B', data: [3, 2, 9, 5, 4, 6, 4], backgroundColor: colors[1] }
            ]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            plugins: { legend: { position: 'bottom' } }
        }
    });

    /* PEAK CIRCLES (BI-POLAR BAR CHART) */
    new Chart(document.getElementById('peakCirclesChart'), {
        type: 'bar',
        data: {
            labels: ['W1', 'W2', 'W3', 'W4', 'W5', 'W6', 'W7', 'W8', 'W9', 'W10'],
            datasets: [{
                data: [1, 2, 4, 8, 6, -2, -1, -4, -6, -2],
                backgroundColor: function(ctx) {
                    return ctx.raw >= 0 ? colors[0] : colors[2];
                }
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { min: -10, max: 10 } }
        }
    });

    /* THRESHOLD LINE CHART */
    new Chart(document.getElementById('thresholdChart'), {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                data: [5, -4, 3, 7, 20, 10],
                borderColor: colors[0],
                segment: {
                    borderColor: function(ctx) {
                        return ctx.p0.parsed.y < 4 && ctx.p1.parsed.y < 4 ? colors[2] : colors[0];
                    }
                },
                fill: false,
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                annotation: false
            },
            scales: { y: { ticks: { stepSize: 1 } } }
        }
    });

    /* ANIMATED LINE CHART */
    new Chart(document.getElementById('animatedLineChart'), {
        type: 'line',
        data: {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
            datasets: [
                { data: [12, 9, 7, 8, 5, 4, 6, 2, 3, 3, 4, 6], borderColor: colors[0], fill: false, tension: 0.3 },
                { data: [4, 5, 3, 7, 3, 5, 5, 3, 4, 4, 5, 5], borderColor: colors[1], fill: false, tension: 0.3 },
                { data: [5, 3, 4, 5, 6, 3, 3, 4, 5, 6, 3, 4], borderColor: colors[2], fill: false, tension: 0.3 },
                { data: [3, 4, 5, 6, 7, 6, 4, 5, 6, 7, 6, 3], borderColor: colors[3], fill: false, tension: 0.3 }
            ]
        },
        options: {
            responsive: true,
            animation: { duration: 2000, easing: 'easeOutQuart' },
            plugins: { legend: { display: false } },
            scales: { y: { min: 0 } }
        }
    });

    /* GAUGE CHART (DONUT) */
    new Chart(document.getElementById('gaugeChart'), {
        type: 'doughnut',
        data: {
            labels: ['A', 'B', 'C', 'D'],
            datasets: [{
                data: [20, 10, 30, 40],
                backgroundColor: [colors[0], colors[1], colors[2], colors[3]],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            rotation: -90,
            circumference: 180,
            cutout: '60%',
            plugins: { legend: { position: 'bottom' } }
        }
    });

    /* ANIMATED DONUT CHART */
    new Chart(document.getElementById('animatedDonutChart'), {
        type: 'doughnut',
        data: {
            labels: ['1', '2', '3', '4', '5', '6', '7'],
            datasets: [{
                data: [10, 20, 50, 20, 5, 50, 15],
                backgroundColor: colors,
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            cutout: '50%',
            animation: { animateRotate: true, duration: 1500 },
            plugins: { legend: { position: 'bottom' } }
        }
    });
});
