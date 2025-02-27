declare namespace App.Domain.Dto {
export type BeSearch = {
term: string | null;
setId: string | null;
rarity: string | null;
colors: Array<string> | null;
};
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
export type FeSet = {
id: number;
name: string;
};
}
