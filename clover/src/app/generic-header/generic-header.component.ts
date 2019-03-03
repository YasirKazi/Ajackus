import { Component, OnInit } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Router } from '@angular/router'

@Component({
  selector: 'app-generic-header',
  templateUrl: './generic-header.component.html',
  styleUrls: ['./generic-header.component.css']
})
export class GenericHeaderComponent implements OnInit {

  categoryObj: any = null;

  constructor(private http: HttpClient, private router: Router) {
    this.router = router;
  }

  ngOnInit() {
    this.getCateGoryData();
  }

  getCateGoryData() {
    var url = '/admin/services/getCategoryData.php';
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
      this.categoryObj = response.data;
    }
  }

  navigateToCart() {
    return this.router.navigate(['/checkout']);
  }
}
