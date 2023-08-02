var req = new XMLHttpRequest();
req.open("GET", excelFile, true);
req.responseType = "arraybuffer";

req.onload = function (e) {
	var data = new Uint8Array(req.response);
	var workbook = XLSX.read(data, { type: "array" });

	var worksheet = workbook.Sheets[workbook.SheetNames[0]];
	var jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1 });

	var table = document.getElementById("data-table");

	var headerRow = table.insertRow();
	for (var i = 0; i < jsonData[0].length; i++) {
		var headerCell = document.createElement("th");
		headerCell.textContent = jsonData[0][i];
		headerRow.appendChild(headerCell);
	}

	for (var j = 1; j < jsonData.length; j++) {
		var dataRow = table.insertRow();
		for (var k = 0; k < jsonData[j].length; k++) {
			var dataCell = dataRow.insertCell();
			dataCell.textContent = jsonData[j][k];
			dataCell.setAttribute("rowspan", "1");
			dataCell.setAttribute("colspan", "1");

			var cell = worksheet[XLSX.utils.encode_cell({ r: j, c: k })];
			if (cell && cell.s) {
				var mergeRange = cell.s.merge;
				if (mergeRange) {
					var mergeRowCount = mergeRange.e.r - mergeRange.s.r + 1;
					var mergeColCount = mergeRange.e.c - mergeRange.s.c + 1;

					if (mergeRowCount > 1) {
						dataCell.setAttribute("rowspan", mergeRowCount.toString());
					}
					if (mergeColCount > 1) {
						dataCell.setAttribute("colspan", mergeColCount.toString());
					}
				}
			}
		}
	}
};
req.send();
