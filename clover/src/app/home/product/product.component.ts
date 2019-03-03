import { Component, OnInit } from '@angular/core';
import { GenericHeaderComponent } from '../../generic-header/generic-header.component';
import { NavigationEnd, Router, ActivatedRoute, Params } from '@angular/router'
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Component({
  selector: 'app-product',
  templateUrl: './product.component.html',
  styleUrls: ['./product.component.css']
})
export class ProductComponent implements OnInit {

  productObj: any;
  category: string;

  constructor(private http: HttpClient, private activatedRoute: ActivatedRoute) {
    this.activatedRoute.params.subscribe((params) => {
      this.category = params['category'];
    });
  }

  ngOnInit() {
    this.getProductData();
  }

  getProductData() {
    var url = '/admin/services/getProduct.php?category=' + this.category;
    var thisObj = this;

    return this.http
      .get(url, {
        headers: { 'Content-Type': 'application/json', 'Access-Control-Allow-Origin': '*' }
      })
      .subscribe((res: any) => {
        this.categoryResponse(res);
      });
  }

  categoryResponse(response) {
    if (response && response.data) {
      this.productObj = response.data;
    }
  }

  addToCart(productObj) {
    var tempArray = [];
    if (sessionStorage.getItem('productObj')) {
      tempArray = JSON.parse(sessionStorage.getItem('productObj'));
    }

    tempArray.push(productObj);
    sessionStorage.setItem('productObj', JSON.stringify(tempArray));

    alert('Product Added To Cart');
  }
}
