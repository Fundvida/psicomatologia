import React from 'react';
import AppLayout from '@/Layouts/AppLayout';
import LogoLayout from '@/Layouts/LogoLayout';
import Titulo from '@/Components/Titulo';

export default function HomeAdministrador() {
    return (
      <LogoLayout>
        <AppLayout
          title="Administrador"
        >
          <br/>
            <div className={` min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900`}>
              <Titulo>Home Administrador</Titulo>
              </div>
              <br/>
        </AppLayout>
        </LogoLayout>
      );
    }
    