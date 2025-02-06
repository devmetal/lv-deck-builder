import { Head } from "@inertiajs/react";
import styled from "styled-components";

const Title = styled.h1`
  font-size: 1.5em;
  text-align: center;
  color: #BF4F74;
`;

const Wrapper = styled.section`
  padding: 4em;
  background: papayawhip;
`;

export default function Welcome() {
	return (
		<>
			<Head title="Welcome" />
			<Wrapper>
				<Title>Welcome</Title>
			</Wrapper>
		</>
	);
}
