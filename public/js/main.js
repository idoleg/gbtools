function initActEditForm() {

  var editor = new Quill(document.getElementById('description-editor'), {
    theme: 'snow',
  });

  editor.pasteHTML(document.getElementById('description').value );

  editor.on('text-change', function(delta, oldDelta, source) {
    document.getElementById('description').value = document.getElementById('description-editor').children[0].innerHTML;
  });

  generateActId(document.getElementById('date').value);
  document.getElementById('date').addEventListener('change', function () {
    generateActId(this.value);
  });

  mathSum(document.getElementById('sum-without-nds').value);
  document.getElementById('sum-without-nds').addEventListener('change', function () {
    mathSum(this.value);
  });

  generateSumrus(document.getElementById('sum').value);
  document.getElementById('sum').addEventListener('change', function () {
    generateSumrus(this.value);
  });
}

function generateActId(value) {
  document.getElementById('act-id').value = value.replace('-', '').replace('-', '') + '-';
}

function mathSum(value) {
  let t = value * 1.15;
  t = t.toFixed();
  document.getElementById('sum').value = t;
  generateSumrus(t);
}

function generateSumrus(value) {
  document.getElementById('sumrus').value = rubles(value);
}