import { useEffect, useMemo, useState } from 'react';

export default function LazyImage({ src }: { src: string }) {
  const [loading, setLoading] = useState(true);

  const img = useMemo(() => {
    const el = new Image();
    el.src = src;
    return el;
  }, [src]);

  useEffect(() => {
    const onLoad = () => {
      setLoading(false);
    };

    img.addEventListener('load', onLoad);

    return () => {
      img.removeEventListener('load', onLoad);
    };
  }, [img]);

  if (loading) {
    return (
      <div className="h-80 w-full animate-pulse bg-gray-500 rounded-2xl" />
    );
  }

  return <img src={src} className="w-full" />;
}
