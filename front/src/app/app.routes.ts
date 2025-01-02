import { Routes } from '@angular/router';
import { LoginComponent } from './pages/login/login.component';
import { AccessComponent } from './pages/login/access/access.component';
import { AccettazioniComponent } from './pages/accettazioni/accettazioni.component';

export const routes: Routes = [
  {path:'', pathMatch:'full', redirectTo:'/login'},
  {path:'login', component:LoginComponent},
  {path:'access', component:AccessComponent},

  {path:'accettazioni', component:AccettazioniComponent},
];
