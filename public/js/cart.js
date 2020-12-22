// alert('Hello');

let array = [
  {id:1, name: 'item one', price:5000, qty:1, photo:'url'},
  {id:2, name: 'item two', price:7000, qty:1, photo:'url'},
]

localStorage.setItem('cart', JSON.stringify(array));