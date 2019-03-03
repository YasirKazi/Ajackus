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
      var url = '/admin/services/place_order.php';
      var thisObj = this;
      var data = {
        'userId': this.userId,
        'name': this.name,
        'mobile': this.mobile,
        'landMark': this.landMark,
        'town': this.town,
        'adressType': this.adressType,
        'orderDetail': this.productObj
      }
      return this.http
        .post(url, data, {
          headers: { 'Content-Type': 'application/json', 'Access-Control-Allow-Origin': '*' }
        })
        .subscribe((res: any) => {
          this.checkOutResponse(res);
        });
    }
  }
  checkOutResponse(res) {
    if (res.data[0]) {
      alert('Hurray! your Order has been placed Successfully');
      sessionStorage.clear();
      this.router.navigate(['/home']);
    }
  }
}
