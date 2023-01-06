const card1 = document.querySelector('#card-eco');
const card2 = document.querySelector('#card-std');
const card3 = document.querySelector('#card-lux');
const room1 = document.querySelector('#room-1');
const room2 = document.querySelector('#room-2');
const room3 = document.querySelector('#room-3');

const rooms = [room1, room2, room3];

console.log(card1);
// const rooms = {
//     const room1 = document.querySelector("#room-1");
// }

card1.addEventListener('mouseenter', () => {
  room1.classList.add('active');
  room2.classList.remove('active');
  room3.classList.remove('active');
});
card2.addEventListener('mouseenter', () => {
  room2.classList.add('active');
  room1.classList.remove('active');
  room3.classList.remove('active');
});
card3.addEventListener('mouseenter', () => {
  room3.classList.add('active');
  room1.classList.remove('active');
  room2.classList.remove('active');
});
