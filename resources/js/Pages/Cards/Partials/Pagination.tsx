import { Link } from '@inertiajs/react';
import { CaretLeftIcon, CaretRightIcon } from '@radix-ui/react-icons';

export default function Pagination({
  links,
}: {
  links: Array<App.Domain.Dto.FeCardPaginationLink>;
}) {
  const prev = links[0];
  const pages = links.slice(1, -1);
  const next = links[links.length - 1];

  return (
    <div className="p-4 flex justify-center py-8">
      <Link
        only={['cards']}
        href={prev.url ?? ''}
        className="btn btn-square"
        disabled={prev.url === null}
      >
        <CaretLeftIcon width={24} height={24} />
      </Link>
      {pages.map((link) => (
        <Link
          only={['cards']}
          href={link.url ?? ''}
          key={link.label}
          className={`btn ${link.active ? 'btn-secondary' : ''}`}
        >
          {link.label}
        </Link>
      ))}
      <Link
        only={['cards']}
        href={next.url ?? ''}
        className="btn btn-square"
        disabled={next.url === null}
      >
        <CaretRightIcon width={24} height={24} />
      </Link>
    </div>
  );
}
