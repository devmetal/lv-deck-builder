import { Link } from '@inertiajs/react';
import { CaretLeftIcon } from '@radix-ui/react-icons';

export default function Pagination({
  pagination,
}: {
  pagination: App.Domain.Dto.FeCardPagination;
}) {
  const { links } = pagination;

  const prev = links[0];
  const pages = links.slice(1, -1);
  const next = links[links.length - 1];

  return (
    <div className="p-4 flex justify-center py-8">
      <Link
        only={['cards', 'pagination']}
        href={prev.url ?? ''}
        className="btn btn-square"
        disabled={prev.url === null}
      >
        <CaretLeftIcon width={24} height={24} />
      </Link>
      {pages.map((link) => (
        <Link
          only={['cards', 'pagination']}
          href={link.url ?? ''}
          key={link.label}
          className={`btn ${link.active ? 'btn-secondary' : ''}`}
        >
          {link.label}
        </Link>
      ))}
      <Link
        only={['cards', 'pagination']}
        href={next.url ?? ''}
        className="btn"
        disabled={next.url === null}
      >
        Next
      </Link>
    </div>
  );
}
