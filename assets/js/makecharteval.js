const Req = new XMLHttpRequest();
Req.open("GET", excelFile, true);
Req.responseType = "arraybuffer";

Req.onload = (e) => {
	const data = new Uint8Array(Req.response);
	const workbook = XLSX.read(data, { type: "array" });

	const worksheet = workbook.Sheets[workbook.SheetNames[0]];
	const excelData = XLSX.utils.sheet_to_json(worksheet, { header: 1 });

	let labels = excelData.map((item) => {
		return item[0];
	});

	let value = excelData.map((item) => {
		return item[1];
	});

	let KPI = excelData.map((item) => {
		return 45.0;
	});

	labels.shift();
	value.shift();
	KPI.shift();

	const ctx = document.getElementById("chart").getContext("2d");
	const chart = new Chart(ctx, {
		data: {
			labels: labels,
			datasets: [
				{
					type: "bar",
					label: "CPL Mahasiswa",
					data: value,
					backgroundColor: "rgba(0, 123, 255, 0.7)",
					borderColor: "rgba(0, 123, 255, 1)",
					borderWidth: 1,
				},
				{
					type: "line",
					label: "KPI",
					data: KPI,
					backgroundColor: "red",
					backgroundColor: "#dc3545",
					borderColor: "#dc3545",
				},
			],
		},
		options: {
			responsive: true,
			scales: {
				y: {
					beginAtZero: true,
				},
			},
		},
	});
};

Req.send();
