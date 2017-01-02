import { ModuleWithProviders } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { AppComponent } from './app.component';
import { RequestAccessComponent } from './request-access/request-access.component';
import { SigninComponent } from './signin/signin.component';
import { ThankYouComponent } from './thank-you/thank-you.component';

export const router: Routes = [
	{ 
		path:'signin', 
		component:SigninComponent,
	},
	{ 	path:'request-access', 
		component:RequestAccessComponent,
	},
	{ 	path:'thank-you', 
		component:ThankYouComponent,
	},	
	{ 	path:'', 
		redirectTo:'/request-access', 
		pathMatch:'full'
	}
];

export const routes: ModuleWithProviders = RouterModule.forRoot(router);