import React from 'react';

export default function Title({children='Sin Titulo',textSize='text-3xl',textColor='text-customVerdeOscuro'}){
    return (
    <div className={`${textSize} ${textColor}`}>{children}</div>
    );
}