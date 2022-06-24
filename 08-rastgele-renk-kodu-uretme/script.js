const colors = (param1, param2) =>
  "#" +
  Math.floor(Math.random() * param1)
    .toString(16)
    .padEnd(param2, "0");
let color1 = colors(0xffffffff, 8);
let color2 = colors(0xffffff, 6);

const contents = (param1, param2) => {
  console.log("HEX: " + param2);
  document.getElementById(param1).value = param2;
  document.getElementById(param1).style.backgroundColor = param2;
};
contents("code1", color1);
contents("code2", color2);

const copyText = (param) => {
  let copy = document.getElementById(param);
  copy.select();
  copy.setSelectionRange(0, 99999);
  document.execCommand("copy"); // execCommand()
  alert("Kopyalanan HEX Kodu: " + copy.value);
};
