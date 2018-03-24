function initActEditForm() {

  generateActId(document.getElementById('date').value);
  document.getElementById('date').addEventListener('change', function() {generateActId(this.value)});

  generateSumrus(document.getElementById('sum').value);
  document.getElementById('sum').addEventListener('change', function() { generateSumrus(this.value)});
}

function generateActId(value) {
  document.getElementById('act-id').value = value.replace('-', '').replace('-', '') + '-';
}

function generateSumrus(value) {
  document.getElementById('sumrus').value = rubles(value);
}