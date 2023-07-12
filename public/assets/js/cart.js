$( document ).ready(function() {
    console.log( "ready!" );
    let cartObj = JSON.parse(localStorage.getItem('cart'));
    if (cartObj == null) {
      $('span#cartcount').text(0)
    } else {
      $('span#cartcount').text(cartObj.itemcount)
    }
});

function addToCart(product) {    
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    let cartData = localStorage.getItem("cart");

    if (!cartData) {
      cartData = {total : 0 , itemcount: 0, items : []};
    }
    else{
      cartData = JSON.parse(cartData); 
    }

    let found = cartData.items.some(el => el.id === product.id);
    if (!found) {
      cartData.items.push({ id:product.id, name: product.name, price: product.regular_price, image: product.product_images[0].image_path });
      
      let sum = 0;
      let count = 0;

      cartData.items.forEach(element => {
        count++;
        sum += element.price;
      });

      cartData.total = sum;
      cartData.itemcount = count;

      $('span#cartcount').text(count);

      localStorage.setItem("cart",JSON.stringify(cartData));

      Toast.fire({
        icon: 'success',
        title: 'Product added into cart'
      })
    }
    else{
      Toast.fire({
        icon: 'error',
        title: 'Product already cart'
      })
    }
}