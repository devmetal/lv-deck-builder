declare namespace App.Domain.Dto {
export type FeCard = {
id: number;
image: App.Domain.Dto.FeCardImage | null;
price: number | null;
faces: Array<App.Domain.Dto.FeCardFace> | null;
};
export type FeCardFace = {
id: number;
name: string;
image: App.Domain.Dto.FeCardImage | null;
};
export type FeCardImage = {
png: string;
small: string;
large: string;
};
}
