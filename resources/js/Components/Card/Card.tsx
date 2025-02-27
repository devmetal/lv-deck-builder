import { motion } from 'motion/react';
import { PointerEventHandler, useState } from 'react';

export default function Card({ card }: { card: App.Domain.Dto.FeCard }) {
  const [facesVisible, setFacesVisible] = useState(false);
  const [facesDirection, setFacesDirection] = useState<'left' | 'right'>(
    'right',
  );

  const { faces } = card;

  // get the main image, if its not avaiable switch to first face
  const image = card.image?.png ?? faces?.[0]?.image?.png ?? null;

  const showFaces: PointerEventHandler = (e) => {
    const { currentTarget } = e;

    const { x } = currentTarget.getBoundingClientRect();

    if (x > window.innerWidth / 2) {
      setFacesDirection('left');
    } else {
      setFacesDirection('right');
    }

    setFacesVisible(true);
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
        className={`flex ${facesDirection === 'right' ? 'flex-row' : 'flex-row-reverse'}`}
        onPointerLeave={hideFaces}
        onPointerEnter={showFaces}
      >
        <img src={image} className="w-full" />
        {facesVisible && (
          <>
            {faces
              ?.filter((face) => face.image?.png)
              ?.map((face) => face.image?.png)
              ?.filter((png) => png !== image)
              ?.map((png, index) => (
                <motion.img
                  initial={{
                    opacity: 0,
                    x: facesDirection === 'right' ? '-100%' : '100%',
                  }}
                  animate={{ opacity: 1, x: 0 }}
                  transition={{
                    delay: 0.5 * index,
                    type: 'spring',
                    bounce: 0.2,
                    duration: 0.6,
                  }}
                  className="w-full z-10"
                  key={png}
                  src={png}
                />
              ))}
          </>
        )}
      </motion.div>

      <div className="badge">{card.price} USD</div>
    </div>
  );
}
