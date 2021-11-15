var coupon10OFF;
var state10OFF = true;
var coupon20OFF;
var state20OFF = true;
function generate_coupon10OFF(length) {
  var coupon = ["10"];
  var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
  var charactersLength = characters.length;
  for (var i = 0; i < length; i++) {
    coupon += characters.charAt(Math.floor(Math.random() * charactersLength));
  }
  return coupon;
}
function generate_coupon20OFF(length) {
  var coupon = ["20"];
  var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
  var charactersLength = characters.length;
  for (var i = 0; i < length; i++) {
    coupon += characters.charAt(Math.floor(Math.random() * charactersLength));
  }
  return coupon;
}
coupon10OFF = generate_coupon10OFF(5);
console.log(coupon10OFF);
coupon20OFF = generate_coupon20OFF(6);
console.log(coupon20OFF);
function del_coupons(coupon10OFF, coupon20OFF) {
  var empty = 0;
  couponinputted = document.getElementById("promo-code").value;
  if (coupon10OFF == couponinputted) {
    coupon10OFF = empty;
    console.log(coupon10OFF);
    return coupon10OFF;
  }
  if (coupon20OFF == couponinputted) {
    coupon20OFF = empty;
    console.log(coupon20OFF);
    return coupon20OFF;
  }
}
function subtotal() {
  var total_item1 = parseFloat(document.getElementById("total_item1").value);
  var total_item2 = parseFloat(document.getElementById("total_item2").value);
  var total;
  total = total_item1 + total_item2;
  var subtotal = (document.getElementById("subtotal").innerHTML =
    "SubTotal: " + total + " $");
}
function total() {
  var total_item1 = parseFloat(document.getElementById("total_item1").value);
  var total_item2 = parseFloat(document.getElementById("total_item2").value);
  var total;
  total = total_item1 + total_item2;
  var TOTAL = (document.getElementById("dis_total").innerHTML =
    "TOTAL: " + total + " $");
}
function totaldis10() {
  var total_item1 = parseFloat(document.getElementById("total_item1").value);
  var total_item2 = parseFloat(document.getElementById("total_item2").value);
  var total;
  total = total_item1 + total_item2;
  var percent = (total / 100) * 10;
  var total_dis = total - percent;
  var TOTAL = (document.getElementById("dis_total").innerHTML =
    "TOTAL: " + total_dis + " $");
}
function totaldis20() {
  var total_item1 = parseFloat(document.getElementById("total_item1").value);
  var total_item2 = parseFloat(document.getElementById("total_item2").value);
  var total;
  total = total_item1 + total_item2;
  var percent = (total / 100) * 20;
  var total_dis = total - percent;
  var TOTAL = (document.getElementById("dis_total").innerHTML =
    "TOTAL: " + total_dis + " $");
}
function update(coupon10OFF, coupon20OFF) {
  var x = document.getElementById("summary_promo");
  x.style.display = "block";
}
function verif_coupons(coupon10OFF, coupon20OFF, total) {
  var couponinputted;
  couponinputted = document.getElementById("promo-code").value;
  console.log(coupon10OFF);
  console.log(coupon20OFF);
  if (coupon10OFF == couponinputted) {
    coupon10OFF = del_coupons(coupon10OFF, coupon20OFF);
    console.log(coupon10OFF);
    alert("coupon valide");
    update(coupon10OFF, coupon20OFF);
    totaldis10();
    var promo = (document.getElementById("Promo").innerHTML = "Promotion: 10%");
  } else {
    alert("coupon non valide");
  }
  if (coupon20OFF == couponinputted) {
    coupon20OFF = del_coupons(coupon10OFF, coupon20OFF);
    console.log(coupon20OFF);
    alert("coupon valide");
    update(coupon10OFF, coupon20OFF);
    totaldis20();
    var promo = (document.getElementById("Promo").innerHTML = "Promotion: 20%");
  } /*else {
    alert("coupon non valide");
  }
  if (coupon10OFF == 0 || coupon20OFF == 0) {
    alert("coupon non valide");
  } else if (coupon10OFF != couponinputted && coupon20OFF != couponinputted) {
    alert("coupon non valide");
  }*/
}
total();
subtotal();
