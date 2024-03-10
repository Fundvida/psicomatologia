import { createContext, useContext } from 'react';
import route from 'ziggy-js';

export const RouteContext = createContext(null);

export default function useRoute() {
  const fn = useContext(RouteContext);
  if (!fn) {
    throw new Error('Route function must be provided');
  }
  return route;
}
