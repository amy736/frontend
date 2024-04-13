import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { AboutusComponent } from './aboutus/aboutus.component';
import { FaqComponent } from './faq/faq.component';
import { AddbookingComponent } from './addbooking/addbooking.component';
import { ViewbookingComponent } from './viewbooking/viewbooking.component';
import { UpdatebookingComponent } from './updatebooking/updatebooking.component';

const routes: Routes = [
  { path: 'home', component: HomeComponent },
  { path: 'aboutus', component: AboutusComponent },
  { path: 'faq', component: FaqComponent },
  { path: 'addbooking', component: AddbookingComponent },
  { path: 'viewbooking', component: ViewbookingComponent },
  { path: 'updatebooking', component: UpdatebookingComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule { }
