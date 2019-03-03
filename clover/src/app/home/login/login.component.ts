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
    var url = '/admin/services/loginUser.php';
    var thisObj = this;
    var data = {
      'email': this.email,
      'password': this.password
    }
    return this.http
      .post(url, data, {
        headers: { 'Content-Type': 'application/json', 'Access-Control-Allow-Origin': '*' }
      })
      .subscribe((res: any) => {
        this.loginResponse(res);
      });
  }

  loginResponse(res) {
    if (res.data[0]) {
      sessionStorage.setItem('userId', res.data[0].user_id);
      this.router.navigate(['/home']);
    }
  }
}
