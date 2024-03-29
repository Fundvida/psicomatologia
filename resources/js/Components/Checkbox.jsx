import React from 'react';
import classNames from 'classnames';

export default function Checkbox(props) {
  return (
    <input
      type="checkbox"
      {...props}
      className={classNames(
        'rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800',
        props.className,
      )}
    />
  );
}
