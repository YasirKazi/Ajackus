import { Component, OnInit } from '@angular/core';
import { NavigationEnd, Router, ActivatedRoute, Params } from '@angular/router'
import { HttpClient, HttpHeaders } from '@angular/common/http';
@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  email: string = '';
  password: string = '';
  constructor(private http: HttpClient, private router: Router) { }

  ngOnInit() {
    var userId = sessionStorage.getItem('userId');
    if (userId) {
      this.router.navigate(['/home']);
    }
  }

  loginUser() {
    var url = '/api/user/login';
    var thisObj = this;
    var data = 'email=' + this.email + '&password=' + this.password;

    return this.http
      .post(url, data, {
        headers: { 'Content-Type': 'application/x-www-form-urlencoded', 'Access-Control-Allow-Origin': '*' }
      })
      .subscribe((res: any) => {
        this.loginResponse(res);
      });
  }

  loginResponse(res) {
    if (res) {
      sessionStorage.setItem('userId', res[0].id);
      this.router.navigate(['/home']);
    }
  }
}
