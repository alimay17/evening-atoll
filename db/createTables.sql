CREATE TABLE "public".movie
(
    movie_name character varying(120),
    movie_img character varying(120),
    movie_desc text[],
    "movie_ID" serial NOT NULL,
    movie_date date,
    PRIMARY KEY ("movie_ID")
);

CREATE TABLE "public".reviewer
(
    "reviewer_ID" serial NOT NULL,
    reviewer_name character varying(120),
    reviewer_email character varying(120),
    PRIMARY KEY ("reviewer_ID")
);

CREATE TABLE "public".movie_review
(
    "movie_ID" integer NOT NULL,
    "reviewer_ID" integer NOT NULL,
    score numrange,
    review text,
    PRIMARY KEY ("movie_ID", "reviewer_ID"),
    CONSTRAINT "movie_ID" FOREIGN KEY ("movie_ID")
        REFERENCES "public".movie ("movie_ID") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT "reveiwer_ID" FOREIGN KEY ("reviewer_ID")
        REFERENCES "public".reviewer ("reviewer_ID") MATCH SIMPLE
);