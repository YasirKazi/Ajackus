import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { ProductComponent } from './home/product/product.component';
import { CheckoutComponent } from './home/checkout/checkout.component';
import { RegisterComponent } from './home/register/register.component';
import { LoginComponent } from './home/login/login.component';

const routes: Routes = [
  { path: 'home', component: HomeComponent },
  { path: 'product/:category', component: ProductComponent },
  { path: 'checkout', component: CheckoutComponent },
  { path: 'register', component: RegisterComponent },
  { path: 'login', component: LoginComponent },
  {
    path: '',
    redirectTo: '/home',
    pathMatch: 'full'
  },
  { path: '**', component: HomeComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
