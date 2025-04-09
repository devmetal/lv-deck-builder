declare namespace App.Domain.Dto {
export type BeDeck = {
name: string;
note: string | null;
cover: string | null;
commander: boolean | null;
};
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
name: string;
colors: Array<string> | null;
};
export type Rarity = 'common' | 'uncommon' | 'rare' | 'special' | 'mythic' | 'bonus';
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
export type FeCardPagination = {
current_page: number;
last_page: number;
first_page_url: string;
last_page_url: string;
next_page_url: string | null;
prev_page_url: string | null;
links: Array<App.Domain.Dto.FeCardPaginationLink>;
data: Array<App.Domain.Dto.FeCard>;
};
export type FeCardPaginationLink = {
url: string | null;
label: string;
active: boolean;
};
export type FeDeck = {
id: number;
name: string;
note: string | null;
cover: string | null;
commander: boolean;
};
export type FeSet = {
id: number;
name: string;
};
}
