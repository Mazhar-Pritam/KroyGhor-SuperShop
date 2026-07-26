document.addEventListener("DOMContentLoaded", function() {
    function getData() {
        return [
            ["", "Kia", "Nissan", "Toyota", "Honda", "Mazda", "Ford"],
            ["2026", 10, 11, 12, 13, 15, 16],
            ["2027", 10, 11, 12, 13, 15, 16],
            ["2028", 10, 11, 12, 13, 15, 16],
            ["2029", 10, 11, 12, 13, 15, 16],
            ["2025", 10, 11, 12, 13, 15, 16]
        ]
    }

    // Rebuild all heatmap data.
    // Guard: getDataAtCol() needs instance.view._wt which doesn't exist
    // when afterLoadData fires during init (before view is created).
    // afterInit handles the initial build instead.
    function rebuildHeatmap() {
        if (!this.view) return;
        heatmap = [];
        for (var i = 1, colCount = this.countCols(); i < colCount; i++) {
            heatmap[i] = generateHeatmapData.call(this, i);
        }
    }

    // Update a single column's heatmap data — used by beforeChangeRender
    function updateHeatmapColumn(changes, source) {
        if (changes) {
            heatmap[changes[0][1]] = generateHeatmapData.call(this, changes[0][1]);
        }
    }

    function point(min, max, value) {
        return (value - min) / (max - min)
    }

    function generateHeatmapData(colId) {
        var values = this.getDataAtCol(colId);
        return {
            min: Math.min.apply(null, values),
            max: Math.max.apply(null, values)
        }
    }

    function heatmapRenderer(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);
        if (heatmap[col]) {
            td.style.backgroundColor = heatmapScale(point(heatmap[col].min, heatmap[col].max, parseInt(value, 10))).hex();
            td.style.textAlign = "right";
        }
        return td;
    }

    var jqContainer = document.getElementById("jQuery");
    new Handsontable(jqContainer, {
        data: getData(),
        rowHeaders: true,
        colHeaders: true,
        contextMenu: true
    });

    var heatmap = [], heatmapScale, hot, data = [
            [2026, 190251, 5090, 195341],
            [2027, 224495, 6486, 230981],
            [2028, 254044, 6765, 260809],
            [2029, 254099, 7521, 261620],
            [2025, 271108, 9449, 280557],
            [2026, 280565, 11714, 292279],
            [2027, 284120, 11292, 295412],
            [2028, 279742, 11468, 291210],
            [2029, 290411, 11806, 302217],
            [2025, 290652, 10891, 301543],
            [2026, 283863, 10402, 294265],
            [2027, 267646, 10104, 255850]
        ],
        container = document.getElementById("chromaJS");

    heatmapScale = chroma.scale(["#FFFFFF", "#8BC34A"]);
    hot = new Handsontable(container, {
        data: data,
        colHeaders: ["Year", "Domestic Flights", "International Flights", "Total Flights"],
        columns: [{
            type: "numeric"
        }, {
            type: "numeric",
            format: "0,0",
            renderer: heatmapRenderer
        }, {
            type: "numeric",
            format: "0,0",
            renderer: heatmapRenderer
        }, {
            type: "numeric",
            format: "0,0",
            renderer: heatmapRenderer
        }],
        afterInit: function() {
            rebuildHeatmap.call(this);
            this.render();
        },
        afterLoadData: rebuildHeatmap,
        beforeChangeRender: updateHeatmapColumn
    });
});
