console.log("JavaScript загрузился!"); // Проверка, загружается ли скрипт

var count = 0;
document.getElementById("myButton").onclick = function () {
    console.log("Кнопка нажата!"); // Проверка, срабатывает ли клик
    count++;
    if (count % 2 == 0) { 
        document.getElementById("demo").innerHTML = "";
    } else {
        var img = document.createElement("img");
        img.src = "https://upload.wikimedia.org/wikipedia/commons/0/00/Two_adult_Guinea_Pigs_%28Cavia_porcellus%29.jpg";
        document.getElementById("demo").appendChild(img);
    }
}
