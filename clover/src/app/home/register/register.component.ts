import { Component, OnInit } from '@angular/core';
import { NavigationEnd, Router, ActivatedRoute, Params } from '@angular/router'
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {

  name: string = '';
  email: string = '';
  password: string = '';
  constructor(private http: HttpClient, private router: Router) {
  }

  ngOnInit() {
  }

  registerUser() {
    var url = '/api/user/register';
    var thisObj = this;
    var data = 'name=' + this.name + '&email=' + this.email + '&password=' + this.password;

    return this.http
      .post(url, data, {
        headers: { 'Content-Type': 'application/x-www-form-urlencoded', 'Access-Control-Allow-Origin': '*' }
      })
      .subscribe((res: any) => {
        this.registerResponse(res);
      });
  }

  registerResponse(res) {
    if (res) {
      alert('Congratulations! You are now registered with us');
      this.router.navigate(['/home']);
    }
  }
  navigateToLogin() {
    this.router.navigate(['/login']);
  }
}
