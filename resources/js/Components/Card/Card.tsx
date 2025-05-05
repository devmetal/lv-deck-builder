import useOutsideClick from '@/hooks/useOutsideClick';
import { motion, SpringOptions, useSpring } from 'motion/react';
import { MouseEventHandler, useState } from 'react';
import LazyImage from '../LazyImage/LazyImage';
import Faces from './Faces';

const spring: SpringOptions = { velocity: 2 };

export default function Card({
  card,
  renderCardActions,
}: {
  card: App.Domain.Dto.FeCard;
  renderCardActions?: (card: App.Domain.Dto.FeCard) => React.ReactNode;
}) {
  const [facesVisibleAt, setFacesVisibleAt] = useState<
    false | 'left' | 'right'
  >(false);

  const [active, setActive] = useState(false);

  const scale = useSpring(1, spring);
  const rotate = useSpring(0, spring);
  const zIndex = useSpring(0, spring);

  const ref = useOutsideClick<HTMLDivElement>({
    onOutsideClick: () => {
      if (!active) {
        return;
      }
      setActive(false);
      setFacesVisibleAt(false);
      scale.set(1);
      rotate.set(0);
      zIndex.set(0);
    },
  });

  const image = card.image?.png ?? card.faces?.[0]?.image?.png ?? null;

  const faces = card.faces
    ?.map((face) => face.image?.png)
    ?.filter((png): png is string => !!png?.length)
    ?.filter((png) => png !== image);

  const showFacesAt = (elem: Element) => {
    const { x } = elem.getBoundingClientRect();

    if (x > window.innerWidth / 2) {
      setFacesVisibleAt('left');
    } else {
      setFacesVisibleAt('right');
    }
  };

  const activate: MouseEventHandler = (e) => {
    if (active) {
      setActive(false);
      setFacesVisibleAt(false);
      scale.set(1);
      rotate.set(0);
      zIndex.set(0);
      return;
    }

    setActive(true);
    showFacesAt(e.currentTarget);
    scale.set(1.2);
    rotate.set(2);
    zIndex.set(1);
  };

  if (!image) {
    return null;
  }

  return (
    <div className="flex flex-col items-center gap-2">
      <motion.div
        ref={ref}
        style={{ scale, rotate, zIndex }}
        onClick={activate}
        className={`w-full relative flex ${facesVisibleAt === 'right' ? 'flex-row' : 'flex-row-reverse'}`}
      >
        <LazyImage src={image} />
        {facesVisibleAt && <Faces faces={faces ?? []} dir={facesVisibleAt} />}
        {active && (
          <motion.div
            initial={{ opacity: 0 }}
            animate={{ opacity: 1, rotate: -2 }}
            className="absolute top-4 left-4 right-4  h-24 p-2"
          >
            {renderCardActions?.(card)}
          </motion.div>
        )}
      </motion.div>

      <div className="badge">{card.price} USD</div>
    </div>
  );
}
