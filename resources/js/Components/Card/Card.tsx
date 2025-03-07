import { motion } from 'motion/react';
import { PointerEventHandler, useState } from 'react';
import Faces from './Faces';

export default function Card({ card }: { card: App.Domain.Dto.FeCard }) {
  const [facesVisible, setFacesVisible] = useState<false | 'left' | 'right'>(
    false,
  );

  const image = card.image?.png ?? card.faces?.[0]?.image?.png ?? null;

  const faces = card.faces
    ?.map((face) => face.image?.png)
    ?.filter((png): png is string => !!png?.length)
    ?.filter((png) => png !== image);

  const showFaces: PointerEventHandler = (e) => {
    const { currentTarget } = e;

    const { x } = currentTarget.getBoundingClientRect();

    if (x > window.innerWidth / 2) {
      setFacesVisible('left');
    } else {
      setFacesVisible('right');
    }
  };

  const hideFaces = () => {
    setFacesVisible(false);
  };

  if (!image) {
    return null;
  }

  return (
    <div className="flex flex-col items-center gap-2">
      <motion.div
        whileHover={{ scale: 1.2, rotate: 2, zIndex: 1 }}
        whileTap={{ scale: 1.2, rotate: 2, zIndex: 1 }}
        className={`flex ${facesVisible === 'right' ? 'flex-row' : 'flex-row-reverse'}`}
        onPointerLeave={hideFaces}
        onPointerEnter={showFaces}
      >
        <img src={image} className="w-full" />
        {facesVisible && <Faces faces={faces ?? []} dir={facesVisible} />}
      </motion.div>

      <div className="badge">{card.price} USD</div>
    </div>
  );
}
