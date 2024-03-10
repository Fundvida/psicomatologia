import { router } from '@inertiajs/core';
import { Link, Head } from '@inertiajs/react';
import classNames from 'classnames';
import React, {useState } from 'react';
import Banner from '@/Components/Banner';


export default function AppLayout({
  children,
}) {

  return (
    <div>
      <Head/>

      <Banner />

      <div className="min-h-screen bg-gray-100 dark:bg-gray-900">



        <nav className="dark:bg-gray-800">
            
                <div className="grid grid-cols-3">
                        {/* <!-- Logo Gabinete Sanacion de la Conducta con fondo --> */}
                        <img className=" p-4 justify-self-start self-center" src='http://localhost:8000/images/logoGabineteSanacionConducta.png'></img>
                       
                        
                        <div className='bg-customMoradoClaro' >
                          <div className="h-0 w-0 border-t-[50px] border-l-[75px] border-b-[50px] 
                        border-solid border-t-customMoradoClaro border-b-customMoradoClaro border-l-customBlanco"></div>
                        </div>
                        <div className='bg-customMoradoClaro grid grid-cols-4 p-4'>
                              {/* <!-- Logo Fundacion Educar con fondo --> */}
                              <img className="justify-self-start self-center col-span-3" src='http://localhost:8000/images/logoFundacionEducar.png'></img>
                        <img className=" justify-self-center self-center max-h-12" src='http://localhost:8000/images/bolivia.png'></img> 
                        </div>
                        
                </div>

        </nav>

        {/* <!-- Page Content --> */}
        <main>{children}</main>
      </div>
    </div>
  );
}
