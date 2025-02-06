import { Head, Link } from '@inertiajs/react';
import styled from 'styled-components';

const Wrapper = styled.section`
  padding: 4em;
  display: flex;
`;

export default function Welcome() {
  return (
    <>
      <Head title="Welcome" />
      <Wrapper>
        <Link href={route('login')}>Go to your collection</Link>
      </Wrapper>
    </>
  );
}
