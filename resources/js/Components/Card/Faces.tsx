import { motion } from 'motion/react';

export default function Faces({
  faces,
  dir,
}: {
  faces: string[];
  dir: 'left' | 'right';
}) {
  return (
    <>
      {faces.map((face, index) => (
        <motion.img
          initial={{
            opacity: 0,
            x: dir === 'right' ? '-100%' : '100%',
          }}
          animate={{ opacity: 1, x: 0 }}
          transition={{
            delay: 0.5 * index,
            type: 'spring',
            bounce: 0.2,
            duration: 0.6,
          }}
          className="w-full z-10"
          key={face}
          src={face}
        />
      ))}
    </>
  );
}
