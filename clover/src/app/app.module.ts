import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { GenericHeaderComponent } from './generic-header/generic-header.component';
import { ServiceWorkerModule } from '@angular/service-worker';
import { environment } from '../environments/environment';
import { HomeComponent } from './home/home.component';
import { HttpClientModule } from '@angular/common/http';
import { ProductComponent } from './home/product/product.component';
import { CheckoutComponent } from './home/checkout/checkout.component';
import { RegisterComponent } from './home/register/register.component';
import { FormsModule } from '@angular/forms';
import { LoginComponent } from './home/login/login.component';

@NgModule({
  declarations: [
    AppComponent,
    GenericHeaderComponent,
    HomeComponent,
    ProductComponent,
    CheckoutComponent,
    RegisterComponent,
    LoginComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    AppRoutingModule,
    FormsModule,
    ServiceWorkerModule.register('ngsw-worker.js', { enabled: environment.production })
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
