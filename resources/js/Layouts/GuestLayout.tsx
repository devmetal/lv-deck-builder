import type { PropsWithChildren } from "react";

export default function Guest({ children }: PropsWithChildren) {
	return (
		<div>
			<div>{children}</div>
		</div>
	);
}
