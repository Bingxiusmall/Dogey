<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<script>
			function copy(){
				var element = document.getElementById('clicktocopy');
				element.select();
				document.execCommand("Copy");
				window.alert("Copy successfully");
			}
		</script>
		<style>
			.container {
				width: 100%;
				position: relative;
				font-size: 14px;
				line-height: 15px;
			}
			.container div {         
				visibility: hidden;
				padding: 100px 0px;
			}
			.container textarea {
				width: 100%;
				height: 100%;
				position: absolute;
				top: 0px;
				padding: 0px;
				box-sizing: content-box;
			}
		</style>
	</head>
	<body>
		<h3>
Welcome to Dogey Program Communication.<br>
Do your Dogey Project now.<br>
try to use:<br>
<textarea id="clicktocopy" style="width:100%;height:200px;">
doge  doge  DOGE   doge  doge doge doge doge  DOGE   doge doge doge      doge   doge  doge doge doge doge  DOGE   doge doge          DOGE   doge  doge  doge doge   doge doge doge  DOGE   doge  doge  doge   doge  doge  doge   doge doge      DOGE   doge doge  doge  doge  DOGE   doge  doge doge doge doge  DOGE   doge          DOGE   doge doge      DOGE   doge doge  doge doge   doge  doge  doge   doge doge  doge   doge  doge doge doge doge doge   doge doge          DOGE
doge doge    doge   doge doge  doge doge   doge    doge  DOGE   doge  doge doge doge   doge doge doge  doge   doge doge    doge doge  DOGE   doge  doge  DOGE   doge doge    doge doge doge



</textarea>
<br>
<button onclick="copy();">click to copy</button>
<br>
to print 'Hello, world!' :)
		</h3>
		<script>
			function run(){
				var element = document.getElementById('run');
				element.onclick = function(){alert('please wait...');};
				element.innerHTML = 'Please wait...';
				element = document.getElementById('Dogey input');
				value = element.value;
				element = document.getElementById('output');
				element.srcdoc = 'Please wait for response...';
				fetch('https://raw.githubusercontent.com/Bingxiusmall/Dogey/main/Dogey%20Demo/main.py?value='+value)
					.then(function(response) {
						return response.text();
					})
					.then(function(text) {
						element.srcdoc = to_nbsp(to_br(text));
						element = document.getElementById('run');
						//element.onclick = run();
						element.innerHTML = 'click to run';
					});
			}
		</script>
		<button id='run' onclick="run()">click to run</button>
		<br>
		<h3>
main.dogey
		</h3>
		<div class="container">	
			<div></div>
			<textarea id="Dogey input" style="width:100%;">
doge  doge  DOGE   doge  doge doge doge doge  DOGE   doge doge doge      doge   doge  doge doge doge doge  DOGE   doge doge          DOGE   doge  doge  doge doge   doge doge doge  DOGE   doge  doge  doge   doge  doge  doge   doge doge      DOGE   doge doge  doge  doge  DOGE   doge  doge doge doge doge  DOGE   doge          DOGE   doge doge      DOGE   doge doge  doge doge   doge  doge  doge   doge doge  doge   doge  doge doge doge doge doge   doge doge          DOGE
doge doge    doge   doge doge  doge doge   doge    doge  DOGE   doge  doge doge doge   doge doge doge  doge   doge doge    doge doge  DOGE   doge  doge  DOGE   doge doge    doge doge doge



</textarea>
		</div>
		<h3>
output
		</h3>
		<iframe id='output' style="width:100%;height:500px;">
		</iframe>
		<script>
			const textarea = document.querySelector('.container textarea');
			const div = document.querySelector('.container div');
			textarea.addEventListener('input', (e) => {
				div.innerText = e.target.value;
			});
		</script>
		<script>
			function to_br(text) {
				return text.replace(/\n|\r/g, '<br>');
			}
			function to_nbsp(text) {
				return text.replace(/( )/g, '&nbsp;');
			}
		</script>
	</body>
</html>
