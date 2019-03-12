import { Component, OnInit } from '@angular/core';
import { NavigationEnd, Router, ActivatedRoute, Params } from '@angular/router'
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Component({
  selector: 'app-checkout',
  templateUrl: './checkout.component.html',
  styleUrls: ['./checkout.component.css']
})
export class CheckoutComponent implements OnInit {

  productObj: any;
  name: string;
  mobile: string;
  landMark: string;
  town: string;
  adressType: string;
  userId: any = null;
  cod: boolean = false;
  showPaymentMethod: boolean = false;
  orderTotal: number = 0;
  constructor(private http: HttpClient, private router: Router) { }

  ngOnInit() {
    this.userId = sessionStorage.getItem('userId');
    this.getCartDetails();
  }

  getCartDetails() {
    this.productObj = JSON.parse(sessionStorage.getItem('productObj'));
  }

  removeFromCart(index) {
    if (this.productObj) {
      this.productObj.splice(index, 1);
      sessionStorage.setItem('productObj', JSON.stringify(this.productObj));
    }
  }


  showPaymentSection() {
    this.showPaymentMethod = true;
  }

  checkOut() {
    if (!this.userId) {
      this.router.navigate(['/register']);

    } else {
      var orderTotal = 0;
      var thisObj = this;
      for (var i = 0; i < thisObj.productObj.length; i++) {
        orderTotal = parseFloat(orderTotal + thisObj.productObj[i].price);
      }
      this.orderTotal = orderTotal;


      var url = '/api/order/confirm';
      var thisObj = this;
      var data = 'userId=' + this.userId +
        '&name=' + this.name +
        '&mobile=' + this.mobile +
        '&landmark=' + this.landMark +
        '&town=' + this.town +
        '&adressType=' + this.adressType +
        '&orderTotal=' + this.orderTotal +
        '&orderDetail=' + JSON.stringify(this.productObj);

      return this.http
        .post(url, data, {
          headers: { 'Content-Type': 'application/x-www-form-urlencoded', 'Access-Control-Allow-Origin': '*', 'responseType': 'text' }
        })
        .subscribe((res: any) => {
          this.checkOutResponse(res);
        });
    }
  }

  checkOutResponse(res) {
    if (res) {
      alert('Hurray! your Order has been placed Successfully');
      sessionStorage.removeItem('productObj');
      this.router.navigate(['/home']);
    }
  }
}
